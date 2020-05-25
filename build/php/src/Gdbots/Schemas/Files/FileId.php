<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Files;

use Gdbots\Pbj\Assertion;
use Gdbots\Pbj\Exception\AssertionFailed;
use Gdbots\Pbj\WellKnown\Identifier;
use Gdbots\Pbj\WellKnown\UuidIdentifier;

/**
 * A file id is a composite id that contains enough data to easily
 * generate file paths, urls and distribute files in storage.
 *
 * FileId Format:
 *  type_ext_yyyymmdd_uuid
 *
 * Formats:
 *  TYPE: [a-z0-9]{1,12}    generally one of: image, video, document, audio, unknown
 *  DATE: [0-9]{8}          YYYYMMDD, e.g. 20151201
 *  EXT:  [a-z0-9]{1,10}    jpg, gif, mp4, pdf
 *  UUID: [a-z0-9]{32}      v4 or v5 uuid is recommended - no dashes
 *
 * Examples:
 *  image_jpg_20151201_27ca03c7b490460992a78692aca42b10
 *  video_mp4_20151201_27ca03c7b490460992a78692aca42b10
 *  document_pdf_20151201_27ca03c7b490460992a78692aca42b10
 *
 */
final class FileId implements Identifier
{
    /**
     * Regular expression pattern for matching a valid FileId string.
     * @constant string
     */
    const VALID_PATTERN = '/^([a-z0-9]{1,12})_([a-z0-9]{1,10})_([0-9]{8})_([a-f0-9]{32})$/';

    /**
     * Earlier versions of the "toFilePath" put the hash after the date:
     * - image/250x/2015/12/01/27/27ca03c7b490460992a78692aca42b10_n.jpg
     * in the above example, the "/27/" is the first two characters of the uuid.
     *
     * In the new version, the hash is stored directly after that type to ensure
     * maximum throughput when reading/writing files to S3 and similar services.
     * - image/27/250x/2015/12/01/27ca03c7b490460992a78692aca42b10_n.jpg
     *
     * @var bool
     */
    private static bool $useLegacyFilePath = false;

    private string $id;
    private string $type;
    private string $ext;
    private string $date;
    private string $uuid;

    private function __construct(string $type, string $ext, string $date, string $uuid)
    {
        $this->type = $type;
        $this->ext = $ext;
        $this->date = $date;
        $this->uuid = strtolower(str_replace('-', '', $uuid));
        $this->id = sprintf('%s_%s_%s_%s', $type, $ext, $this->date, $this->uuid);
    }

    public static function fromString(string $string): self
    {
        if (!preg_match(self::VALID_PATTERN, $string, $matches)) {
            throw new AssertionFailed(
                sprintf(
                    'FileId [%s] is invalid.  It must match the pattern [%s].',
                    $string,
                    self::VALID_PATTERN
                ),
                Assertion::INVALID_REGEX,
                null,
                $string
            );
        }

        return new self($matches[1], $matches[2], $matches[3], $matches[4]);
    }

    /**
     * @param string             $type The primary type for this file. e.g. image, video, audio.
     * @param string             $ext  Extension of the file.  jpg, gif, mp4, txt, pdf
     * @param \DateTimeInterface $date
     * @param UuidIdentifier     $uuid Uuid for the file, if not supplied a v4 uuid will be created.
     *
     * @return self
     *
     * @throws AssertionFailed
     */
    public static function create(
        string $type,
        string $ext,
        ?\DateTimeInterface $date = null,
        ?UuidIdentifier $uuid = null
    ): self {
        $date = $date ?: new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        $uuid = $uuid ?: UuidIdentifier::generate();
        $fileId = new self($type, $ext, $date->format('Ymd'), $uuid->toString());
        if (!preg_match(self::VALID_PATTERN, $fileId->id)) {
            throw new AssertionFailed(
                sprintf(
                    'FileId [%s] is invalid.  It must match the pattern [%s].',
                    $fileId->id,
                    self::VALID_PATTERN
                ),
                Assertion::INVALID_REGEX,
                null,
                $fileId->id
            );
        }

        return $fileId;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getExt(): string
    {
        return $this->ext;
    }

    /**
     * @param bool $asObject Returns the date as a \DateTimeInterface instead of Ymd string.
     *
     * @return \DateTimeInterface|string
     */
    public function getDate(bool $asObject = false)
    {
        if ($asObject) {
            return \DateTimeImmutable::createFromFormat('!Ymd', $this->date, new \DateTimeZone('UTC'));
        }

        return $this->date;
    }

    /**
     * @param bool $asObject Returns the uuid as a UuidIdentifier instead of formatted uuid string (all lowercase, no dashes)
     *
     * @return UuidIdentifier|string
     */
    public function getUuid(bool $asObject = false)
    {
        if ($asObject) {
            $uuid = [
                substr($this->uuid, 0, 8),
                substr($this->uuid, 8, 4),
                substr($this->uuid, 12, 4),
                substr($this->uuid, 16, 4),
                substr($this->uuid, 20, 12),
            ];
            return UuidIdentifier::fromString(implode('-', $uuid));
        }

        return $this->uuid;
    }

    public function toString(): string
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->toString();
    }

    public function jsonSerialize()
    {
        return $this->toString();
    }

    public function equals(Identifier $other): bool
    {
        return $this == $other;
    }

    /**
     * Returns a path to this file for the given version/quality.  The version and quality are completely arbitrary
     * and up to the consumer of this class.  Typically your "version" would indicate thumbnail size or format of
     * video, etc. and the quality would clarify it further.
     *
     * For example, for the file id 'image_jpg_20151201_27ca03c7b490460992a78692aca42b10'
     *  $fileId->toFilePath('250x', 'n')
     * would return:
     *  'image/27/250x/2015/12/01/27ca03c7b490460992a78692aca42b10_n.jpg'
     *
     * @param string $version An identifier for the version, e.g. "o" for original or "250x" for a thumbnail size.
     * @param string $quality If applicable, a quality setting like "n" for normal or "high", "low", etc.
     *
     * @return string
     */
    public function toFilePath(?string $version = null, ?string $quality = null): string
    {
        if (self::$useLegacyFilePath) {
            return sprintf(
                '%s/%s%s/%s/%s/%s/%s%s.%s',
                $this->type, // image, video, document, etc.
                null === $version ? '' : $version . '/', // o, 250x, hls, etc.
                substr($this->date, 0, 4), // yyyy
                substr($this->date, 4, 2), // mm
                substr($this->date, 6, 2), // dd
                substr($this->uuid, 0, 2),
                $this->uuid,
                null === $quality ? '' : '_' . $quality,
                $this->ext
            );
        }

        return sprintf(
            '%s/%s/%s%s/%s/%s/%s%s.%s',
            $this->type, // image, video, document, etc.
            substr($this->uuid, 0, 2),
            null === $version ? '' : $version . '/', // o, 250x, hls, etc.
            substr($this->date, 0, 4), // yyyy
            substr($this->date, 4, 2), // mm
            substr($this->date, 6, 2), // dd
            $this->uuid,
            null === $quality ? '' : '_' . $quality,
            $this->ext
        );
    }

    public static function useLegacyFilePath(bool $option = true): void
    {
        self::$useLegacyFilePath = $option;
    }
}
