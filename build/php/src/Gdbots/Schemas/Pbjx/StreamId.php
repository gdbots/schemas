<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx;

use Gdbots\Pbj\Assertion;
use Gdbots\Pbj\Exception\InvalidArgumentException;
use Gdbots\Pbj\WellKnown\Identifier;

/**
 * A stream id represents a stream of events.  The parts of the id are delimited by a colon
 * for our purposes but can easily be converted to acceptable formats for SNS, Kafka, etc.
 *
 * It may also be desirable to only use parts of the stream id (e.g. topic) for broadcast.
 *
 * Using a partition and optionally a sub-partition makes it possible to group all of those
 * records together in storage and also guarantee their sequence is exactly in the order
 * that they were added to the stream.
 *
 * StreamId Format:
 *  topic:partition:sub-partition
 *
 * Formats:
 *  TOPIC:         [\w\.-]+
 *  PARTITION:     ([\w\.-]+)?
 *  SUB_PARTITION: ([\w\.-]+)?
 *
 * Examples:
 *  "twitter.timeline" (topic), "homer-simpson" (partition), "yyyymm" (sub-partition)
 *      twitter.timeline:homer-simpson:201501
 *      twitter.timeline:homer-simpson:201502
 *      twitter.timeline:homer-simpson:201503
 *
 *  "bank-account" (topic), "homer-simpson" (partition)
 *      bank-account:homer-simpson
 *
 *  "poll.votes" (topic), "batman-vs-superman" (partition), "yyyymm.[0-9a-f][0-9a-f]" (sub-partition)
 *  Note the sub-partition here is two hexidecimal digits allowing for 256 separate streams ids.
 *  Useful when you need to avoid hot keys and ordering in the overall partition isn't important.
 *      poll.votes:batman-vs-superman:20160301.0a
 *      poll.votes:batman-vs-superman:20160301.1b
 *      poll.votes:batman-vs-superman:20160301.c2
 *
 */
final class StreamId implements Identifier
{
    /**
     * Regular expression pattern for matching a valid StreamId string.
     * @constant string
     */
    const VALID_PATTERN = '/^([\w\.-]+)(:([\w\.-]+)(:([\w\.-]+))?)?$/';

    /** @var string */
    private $id;

    /** @var string */
    private $topic;

    /** @var string */
    private $partition;

    /** @var string */
    private $subPartition;

    /**
     * @param string $topic
     * @param string $partition
     * @param string $subPartition
     */
    private function __construct(string $topic, ?string $partition = null, ?string $subPartition = null)
    {
        $this->topic = $topic;
        $this->partition = $partition;
        $this->subPartition = $subPartition;
        $this->id = $topic;

        if (strlen((string)$partition) > 0) {
            $this->id .= ':' . $partition;
            if (strlen((string)$subPartition) > 0) {
                $this->id .= ':' . $subPartition;
            }
        }
    }

    /**
     * {@inheritdoc}
     * @return static
     */
    public static function fromString($string)
    {
        $okay = strlen($string) < 256;
        Assertion::true($okay, 'StreamId cannot be greater than 255 chars.', 'StreamId');
        if (!preg_match(self::VALID_PATTERN, $string, $matches)) {
            throw new InvalidArgumentException(
                sprintf(
                    'StreamId [%s] is invalid.  It must match the pattern [%s].',
                    $string,
                    self::VALID_PATTERN
                )
            );
        }

        return new self(
            $matches[1],
            isset($matches[3]) ? $matches[3] : null,
            isset($matches[5]) ? $matches[5] : null
        );
    }

    /**
     * @return string
     */
    public function getTopic(): string
    {
        return $this->topic;
    }

    /**
     * @return bool
     */
    public function hasPartition(): bool
    {
        return null !== $this->partition;
    }

    /**
     * @return string
     */
    public function getPartition(): ?string
    {
        return $this->partition;
    }

    /**
     * @return bool
     */
    public function hasSubPartition(): bool
    {
        return null !== $this->subPartition;
    }

    /**
     * @return string
     */
    public function getSubPartition(): ?string
    {
        return $this->subPartition;
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
     * Creates a stream id from an sns topic string, assuming it was generated
     * by the "toSnsTopicName" method.
     *
     * @param string $string
     *
     * @return static
     */
    public static function fromSnsTopicName(string $string): self
    {
        return self::fromString(str_replace(['__', '--'], [':', '.'], $string));
    }

    /**
     * Returns a string that can be used for an AWS SNS Topic by replacing colons
     * with two underscores and periods with two hyphens.
     *
     * @return string
     */
    public function toSnsTopicName(): string
    {
        return str_replace([':', '.'], ['__', '--'], $this->id);
    }

    /**
     * Creates a stream id from an s3 path, assuming it was generated by the "toS3Path" method.
     *
     * @deprecated Use 'fromFilePath' instead.
     *
     * @param string $string
     *
     * @return static
     */
    public static function fromS3Path($string): self
    {
        return self::fromFilePath($string);
    }

    /**
     * Returns a string that can be used for an AWS S3 Path by replacing colons with a slash.
     *
     * @deprecated Use 'toFilePath' instead.
     *
     * @return string
     */
    public function toS3Path(): string
    {
        return $this->toFilePath();
    }

    /**
     * Creates a stream id from a file path, assuming it was generated by the "toFilePath" method.
     *
     * @param string $string
     *
     * @return static
     */
    public static function fromFilePath(string $string): self
    {
        $parts = explode('/', $string, 6);
        unset($parts[1]);
        unset($parts[2]);
        return self::fromString(implode(':', $parts));
    }

    /**
     * Returns a string that can be used for a file path by replacing colons with a slash
     * and producing a hash of the partition (if it exists).
     *
     * @return string
     */
    public function toFilePath(): string
    {
        if (!strlen((string)$this->partition)) {
            return str_replace(':', '/', $this->id);
        }

        $hash = md5($this->partition);
        return trim(sprintf(
            '%s/%s/%s/%s/%s',
            $this->topic,
            substr($hash, 0, 2),
            substr($hash, 2, 2),
            $this->partition,
            $this->subPartition
        ), '/');
    }
}
