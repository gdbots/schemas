<?php

namespace Gdbots\Schemas\Ncr;

use Gdbots\Pbj\Assertion;
use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\SchemaQName;
use Gdbots\Pbj\WellKnown\Identifier;

/**
 * A NodeRef is a qualified identifier to a node/vertex.  It is less verbose than a MessageRef
 * as it is implied that node labels must be unique within a given vendor namespace and
 * therefore can be represented in a more compact manner.
 *
 * NodeRef Format:
 *  vendor:label:id
 *
 * The "vendor:label" portion is a SchemaQName.  @see SchemaQName
 *
 * @link http://s3.thinkaurelius.com/docs/titan/1.0.0/schema.html section: 5.4. Defining Vertex Labels
 * @link https://neo4j.com/docs/developer-manual/current/introduction/#graphdb-neo4j-labels
 *
 * Examples:
 *  acme:article:41e4532f-2f58-4b9d-afc8-e9c2cbcb4aba
 *  twitter:tweet:789234931599835136
 *  youtube:video:EG0wQRsXLi4
 *
 */
final class NodeRef implements Identifier
{
    /** @var SchemaQName */
    private $qname;

    /**
     * Any string matching pattern /^[\w\/\.:-]+$/
     * @var string
     */
    private $id;

    /**
     * @param SchemaQName $qname
     * @param string $id
     *
     * @throws \Exception
     */
    public function __construct(SchemaQName $qname, $id)
    {
        $this->qname = $qname;
        $this->id = trim((string) $id);
        Assertion::regex($this->id, '/^[\w\/\.:-]+$/', null, 'NodeRef.id');
    }

    /**
     * @param string $string A string with format vendor:label:id
     *
     * @return self
     */
    public static function fromString($string)
    {
        $parts = explode(':', $string, 3);
        Assertion::count($parts, 3, 'NodeRef format must be "vendor:label:id');
        $id = array_pop($parts);
        $qname = SchemaQName::fromString(implode(':', $parts));
        return new self($qname, $id);
    }

    /**
     * @param MessageRef $messageRef
     *
     * @return self
     */
    public static function fromMessageRef(MessageRef $messageRef)
    {
        return new self(SchemaQName::fromCurie($messageRef->getCurie()), $messageRef->getId());
    }

    /**
     * @return SchemaQName
     */
    public function getQName()
    {
        return $this->qname;
    }

    /**
     * @return string
     */
    public function getVendor()
    {
        return $this->qname->getVendor();
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->qname->getMessage();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        return $this->qname->toString() . ':' . $this->id;
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
