<?php

namespace Gdbots\Tests\Schemas\Ncr;

use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\SchemaQName;
use Gdbots\Schemas\Ncr\NodeRef;

class NodeRefTest extends \PHPUnit_Framework_TestCase
{
    public function testEquals()
    {
        $nodeRef1 = NodeRef::fromString('acme:article:123');
        $nodeRef2 = NodeRef::fromString('acme:article:123');
        $this->assertTrue($nodeRef1->equals($nodeRef2));
        $this->assertTrue($nodeRef2->equals($nodeRef1));
    }

    public function testNotEquals()
    {
        $nodeRef1 = NodeRef::fromString('acme:article:123');
        $nodeRef2 = NodeRef::fromString('acme:article:1234');
        $this->assertFalse($nodeRef1->equals($nodeRef2));
        $this->assertFalse($nodeRef2->equals($nodeRef1));
    }

    public function testValidQname()
    {
        $nodeRef = NodeRef::fromString('acme:article:123');
        $this->assertSame('acme', $nodeRef->getVendor());

        $nodeRef = NodeRef::fromString('acme-widgets:article:123');
        $this->assertSame('acme-widgets', $nodeRef->getVendor());
    }

    /**
     * @expectedException \Gdbots\Pbj\Exception\InvalidSchemaQName
     */
    public function testInvalidQname()
    {
        $nodeRef = NodeRef::fromString('ACME:article:123');
    }

    /**
     * @expectedException \Gdbots\Pbj\Exception\AssertionFailed
     */
    public function testEmptyFromString()
    {
        $nodeRef = NodeRef::fromString('');
    }

    /**
     * @expectedException \Gdbots\Pbj\Exception\AssertionFailed
     */
    public function testInvalidId()
    {
        $nodeRef = NodeRef::fromString('acme:article:invalid!#id');
    }

    /**
     * @expectedException \Gdbots\Pbj\Exception\AssertionFailed
     */
    public function testMissingId()
    {
        $nodeRef = NodeRef::fromString('acme:article');
    }

    public function testComplicatedId()
    {
        $nodeRef = NodeRef::fromString('acme:article:this/id/is:WeirD:and:_.what');
        $this->assertSame('acme', $nodeRef->getVendor());
        $this->assertSame('article', $nodeRef->getLabel());
        $this->assertSame('this/id/is:WeirD:and:_.what', $nodeRef->getId());
    }

    public function testGetProperties()
    {
        $nodeRef = NodeRef::fromString('acme:article:123');
        $this->assertSame('acme', $nodeRef->getVendor());
        $this->assertSame('article', $nodeRef->getLabel());
        $this->assertSame('123', $nodeRef->getId());
        $this->assertSame(SchemaQName::fromString('acme:article'), $nodeRef->getQName());
    }

    public function testToString()
    {
        $expected = 'acme:article:this/id/is:WeirD:and:_.what';
        $nodeRef = NodeRef::fromString($expected);
        $this->assertSame($expected, $nodeRef->toString());
    }

    public function testClone()
    {
        $expected = 'acme:article:this/id/is:WeirD:and:_.what';
        $nodeRef1 = NodeRef::fromString($expected);
        $nodeRef2 = clone $nodeRef1;

        $this->assertSame($expected, $nodeRef1->toString());
        $this->assertSame($expected, $nodeRef2->toString());

        $this->assertTrue($nodeRef1->equals($nodeRef2));
        $this->assertTrue($nodeRef2->equals($nodeRef1));
    }

    public function testFromMessageRef()
    {
        $nodeRef = NodeRef::fromMessageRef(MessageRef::fromString('acme:blog:node:article:123'));
        $this->assertSame('acme', $nodeRef->getVendor());
        $this->assertSame('article', $nodeRef->getLabel());
        $this->assertSame('123', $nodeRef->getId());
    }

    public function testToFilePath()
    {
        $nodeRef = NodeRef::fromString('acme:article:123');
        $this->assertSame('acme/article/20/2c/123', $nodeRef->toFilePath());
        $this->assertTrue($nodeRef->equals(NodeRef::fromFilePath($nodeRef->toFilePath())));
        $this->assertSame($nodeRef->toString(), NodeRef::fromFilePath($nodeRef->toFilePath())->toString());

        $nodeRef = NodeRef::fromString('acme:article:2015/12/25/test');
        $this->assertSame('acme/article/d9/20/2015__FS__12__FS__25__FS__test', $nodeRef->toFilePath());
        $this->assertTrue($nodeRef->equals(NodeRef::fromFilePath($nodeRef->toFilePath())));
        $this->assertSame($nodeRef->toString(), NodeRef::fromFilePath($nodeRef->toFilePath())->toString());

        $nodeRef = NodeRef::fromString('acme-widgets:poll-widget:a:b:C_');
        $this->assertSame('acme-widgets/poll-widget/69/a9/a__CLN__b__CLN__C_', $nodeRef->toFilePath());
        $this->assertTrue($nodeRef->equals(NodeRef::fromFilePath($nodeRef->toFilePath())));
        $this->assertSame($nodeRef->toString(), NodeRef::fromFilePath($nodeRef->toFilePath())->toString());
    }
}
