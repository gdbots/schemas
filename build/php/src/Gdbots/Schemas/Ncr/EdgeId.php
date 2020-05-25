<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Ncr;

use Gdbots\Pbj\Message;
use Gdbots\Pbj\WellKnown\Identifier;
use Ramsey\Uuid\Rfc4122\UuidV5;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class EdgeId implements Identifier
{
    /**
     * For each vendor namespace we create version 5 uuid so
     * the generated ids for an edge don't collide.
     *
     * @var UuidInterface[]
     */
    private static array $namespaces = [];

    private UuidInterface $uuid;

    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
        if (!$uuid instanceof UuidV5) {
            throw new \InvalidArgumentException('A name based (version 5) uuid is required.');
        }
    }

    public static function fromString($string): self
    {
        return new static(Uuid::fromString($string));
    }

    public static function fromEdge(Message $edge): self
    {
        $schemaId = $edge::schema()->getId();
        $vendor = $schemaId->getVendor();

        if (!isset(self::$namespaces[$vendor])) {
            self::$namespaces[$vendor] = Uuid::uuid5(Uuid::NIL, $vendor);
        }

        $id = sprintf(
            '%s~%s~%s',
            (string)$edge->fget('from_ref'),
            $schemaId->getMessage(),
            (string)$edge->fget('to_ref')
        );

        return new static(Uuid::uuid5(self::$namespaces[$vendor], $id));
    }

    public function toString(): string
    {
        return $this->uuid->toString();
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
}
