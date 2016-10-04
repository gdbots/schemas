<?php

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
final class FileId implements Identifier, \JsonSerializable
{
    /**
     * Regular expression pattern for matching a valid FileId string.
     * @constant string
     */
    const VALID_PATTERN = '/^([a-z0-9]{1,12})_([a-z0-9]{1,10})_([0-9]{8})_([a-f0-9]{32})$/';

    /** @var string */
    private $id;

    /** @var string */
    private $type;

    /** @var string */
    private $ext;

    /** @var string */
    private $date;

    /** @var string */
    private $uuid;

    /**
     * @param string $type
     * @param string $ext
     * @param string $date
     * @param string $uuid
     */
    private function __construct($type, $ext, $date, $uuid)
    {
        $this->type = $type;
        $this->ext = $ext;
        $this->date = $date;
        $this->uuid = strtolower(str_replace('-', '', $uuid));
        $this->id = sprintf('%s_%s_%s', $type, $ext, $this->uuid);
    }

    /**
     * {@inheritdoc}
     * @return static
     *
     * @throws AssertionFailed
     */
    public static function fromString($string)
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

        return new self($matches[1], $matches[2], $matches[3]);
    }

    /**
     * @param string $type          The primary type for this file. e.g. image, video, audio.
     * @param string $ext           Extension of the file.  jpg, gif, mp4, txt, pdf
     * @param UuidIdentifier $uuid  Uuid for the file, if not supplied a v4 uuid will be created.
     *
     * @return FileId
     *
     * @throws AssertionFailed
     */
    public static function create($type, $ext, UuidIdentifier $uuid = null)
    {
        $uuid = $uuid ?: UuidIdentifier::generate();
        $fileId = new self($type, $ext, $uuid->toString());
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

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->toString();
    }

    /**
     * {@inheritdoc}
     */
    public function equals(Identifier $other)
    {
        return $this == $other;
    }

    /**
     * Returns a path to this file for the given version/quality.  The version and quality are completely arbitrary
     * and up to the consumer of this class.  Typically your "version" would indicate thumbnail size or format of
     * a video, etc. and the quality would clarify it further.
     *
     * For example, for the file id 'image_jpg_27ca03c7b490460992a78692aca42b10'
     *  $fileId->toFilePath('250x', 'n')
     * would return:
     *  'image/250x/27/ca/03/27ca03c7b490460992a78692aca42b10_n.jpg'
     *
     * @param string $version   An identifier for the version, e.g. "o" for original or "250x" for a thumbnail size.
     * @param string $quality   If applicable, a quality setting like "n" for normal or "high", "low", etc.
     *
     * @return string
     */
    public function toFilePath($version = null, $quality = null)
    {
        return sprintf(
            '%s/%s%s/%s/%s/%s%s.%s',
            $this->type,
            null === $version ? '' : $version.'/',
            substr($this->uuid, 0, 2),
            substr($this->uuid, 2, 2),
            substr($this->uuid, 4, 2),
            $this->uuid,
            null === $quality ? '' : '_'.$quality,
            $this->ext
        );
    }

    /**
     * Returns a directory path of first 6 chars of the uuid as
     * aa/aa/aa which can be used when building file paths.
     *
     * @return string
     */
    public function getDirHash()
    {
        return sprintf(
            '%s/%s/%s',
            substr($this->uuid, 0, 2),
            substr($this->uuid, 2, 2),
            substr($this->uuid, 4, 2)
        );
    }
}
