<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Ncr;

use Gdbots\Pbj\Message;
use Gdbots\Pbj\WellKnown\Identifier;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class EdgeId implements Identifier
{
    /**
     * For each vendor namespace we create version 5 uuid so
     * the generated ids for an edge don't collide.
     *
     * @var UuidInterface[]
     */
    private static $namespaces = [];

    /** @var UuidInterface */
    private $uuid;

    /**
     * @param UuidInterface $uuid
     */
    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
        $version = $uuid->getVersion();
        if ($version !== 5) {
            throw new \InvalidArgumentException(
                sprintf('A name based (version 5) uuid is required.  Version provided [%s].', $version)
            );
        }
    }

    /**
     * {@inheritdoc}
     * @return static
     */
    public static function fromString($string)
    {
        return new static(Uuid::fromString($string));
    }

    /**
     * @param Message $edge
     *
     * @return static
     */
    public static function fromEdge(Message $edge): self
    {
        $schemaId = $edge::schema()->getId();
        $vendor = $schemaId->getVendor();

        if (!isset(self::$namespaces[$vendor])) {
            self::$namespaces[$vendor] = Uuid::uuid5(Uuid::NIL, $vendor);
        }

        $id = sprintf(
            '%s~%s~%s',
            (string)$edge->get('from_ref'),
            $schemaId->getMessage(),
            (string)$edge->get('to_ref')
        );

        return new static(Uuid::uuid5(self::$namespaces[$vendor], $id));
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        return $this->uuid->toString();
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
}
