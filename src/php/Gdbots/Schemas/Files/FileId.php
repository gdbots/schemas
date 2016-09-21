<?php

namespace Gdbots\Schemas\Files;

use Gdbots\Pbj\Assertion;
use Gdbots\Pbj\Exception\AssertionFailed;
use Gdbots\Pbj\WellKnown\Identifier;
use Gdbots\Pbj\WellKnown\UuidIdentifier;

/**
 * A file id is a composite id that contains enough data to easily
 * generate file paths and urls and distribute files in storage.
 *
 * FileId Format:
 *  type_ext_uuid
 *
 * Formats:
 *  TYPE: [a-z0-9]{1,12} (generally one of: image, video, document, audio, unknown)
 *  EXT:  [a-z0-9]{1,10}
 *  UUID: [a-z0-9]{32} (v4 or v5 uuid is recommended - no dashes)
 *
 * Examples:
 *  image_jpg_27ca03c7b490460992a78692aca42b10
 *  video_mp4_27ca03c7b490460992a78692aca42b10
 *  document_pdf_27ca03c7b490460992a78692aca42b10
 *
 */
final class FileId implements Identifier, \JsonSerializable
{
    /**
     * Regular expression pattern for matching a valid FileId string.
     * @constant string
     */
    const VALID_PATTERN = '/^([a-z0-9]{1,12})_([a-z0-9]{1,10})_([a-f0-9]{32})$/';

    /** @var string */
    private $id;

    /** @var string */
    private $type;

    /** @var string */
    private $ext;

    /** @var UuidIdentifier */
    private $uuid;

    /**
     * @param string $type
     * @param string $ext
     * @param UuidIdentifier $uuid
     */
    private function __construct($type, $ext, UuidIdentifier $uuid)
    {
        $this->type = $type;
        $this->ext = $ext;
        $this->uuid = $uuid;
        $this->id = sprintf(
            '%s_%s_%s',
            $type,
            $ext,
            strtolower(str_replace('-', '', $uuid->toString()))
        );
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

        return new self($matches[1], $matches[2], UuidIdentifier::fromString($matches[3]));
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
        $fileId = new self($type, $ext, $uuid);
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
     * @return UuidIdentifier
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
     * Returns a directory path of first 6 chars of the uuid as
     * aa/aa/aa which can be used when building file paths.
     *
     * @return string
     */
    public function getDirHash()
    {
        $uuid = strtolower(str_replace('-', '', $this->uuid->toString()));
        return sprintf(
            '%s/%s/%s',
            substr($uuid, 0, 2),
            substr($uuid, 2, 2),
            substr($uuid, 4, 2)
        );
    }
}
