<?php
declare(strict_types=1);

namespace Gdbots\Tests\Schemas\Pbjx;

use Gdbots\Pbj\Exception\AssertionFailed;
use Gdbots\Pbj\Exception\InvalidArgumentException;
use Gdbots\Pbj\WellKnown\NodeRef;
use Gdbots\Schemas\Pbjx\StreamId;
use PHPUnit\Framework\TestCase;

class StreamIdTest extends TestCase
{
    public function testTopic(): void
    {
        $id = StreamId::fromString('acme:health-checks');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('health-checks', $id->getTopic());
        $this->assertFalse($id->hasPartition(), 'hasPartition should be false.');
        $this->assertNull($id->getPartition(), 'getPartition should be null.');
        $this->assertFalse($id->hasSubPartition(), 'hasSubPartition should be false.');
        $this->assertNull($id->getSubPartition(), 'getSubPartition should be null.');
    }

    public function testPartition(): void
    {
        $id = StreamId::fromString('acme:bank-account:homer-simpson');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('bank-account', $id->getTopic());
        $this->assertTrue($id->hasPartition(), 'hasPartition should be true.');
        $this->assertSame('homer-simpson', $id->getPartition());
        $this->assertFalse($id->hasSubPartition(), 'hasSubPartition should be false.');
        $this->assertNull($id->getSubPartition(), 'getSubPartition should be null.');
    }

    public function testAllParts(): void
    {
        $id = StreamId::fromString('acme:poll.votes:batman-vs-superman:20160301.c2');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('poll.votes', $id->getTopic());
        $this->assertTrue($id->hasPartition(), 'hasPartition should be true.');
        $this->assertSame('batman-vs-superman', $id->getPartition());
        $this->assertTrue($id->hasSubPartition(), 'hasSubPartition should be true.');
        $this->assertSame('20160301.c2', $id->getSubPartition());
    }

    public function testCaseSensitive(): void
    {
        $id = StreamId::fromString('acme:My-Topic:IS_COOL:BR0.T33n');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('My-Topic', $id->getTopic());
        $this->assertTrue($id->hasPartition(), 'hasPartition should be true.');
        $this->assertSame('IS_COOL', $id->getPartition());
        $this->assertTrue($id->hasSubPartition(), 'hasSubPartition should be true.');
        $this->assertSame('BR0.T33n', $id->getSubPartition());
    }

    public function testFromNodeRef(): void
    {
        $nodeRef = NodeRef::fromString('acme:article:123');
        $id = StreamId::fromNodeRef($nodeRef);
        $this->assertSame($nodeRef->getVendor(), $id->getVendor());
        $this->assertSame($nodeRef->getLabel(), $id->getTopic());
        $this->assertSame($nodeRef->getId(), $id->getPartition());
    }

    public function testToSnsTopicName(): void
    {
        $id = StreamId::fromString('acme:My-Topic:IS_COOL:BR0.T33n');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('acme__My-Topic__IS_COOL__BR0--T33n', $id->toSnsTopicName());
        $this->assertTrue($id->equals(StreamId::fromSnsTopicName($id->toSnsTopicName())));
        $this->assertSame($id->toString(), StreamId::fromSnsTopicName($id->toSnsTopicName())->toString());
    }

    public function testToFilePath(): void
    {
        $id = StreamId::fromString('acme:My-Topic:IS_COOL:BR0.T33n');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('acme:My-Topic:IS_COOL:BR0.T33n', $id->toString());
        $this->assertSame('acme/My-Topic/8a/9f/IS_COOL/BR0.T33n', $id->toFilePath());
        $this->assertTrue($id->equals(StreamId::fromFilePath($id->toFilePath())));
        $this->assertSame($id->toString(), StreamId::fromFilePath($id->toFilePath())->toString());

        $id = StreamId::fromString('acme:My-Topic:IS_COOL');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('acme:My-Topic:IS_COOL', $id->toString());
        $this->assertSame('acme/My-Topic/8a/9f/IS_COOL', $id->toFilePath());
        $this->assertTrue($id->equals(StreamId::fromFilePath($id->toFilePath())));
        $this->assertSame($id->toString(), StreamId::fromFilePath($id->toFilePath())->toString());

        $id = StreamId::fromString('acme:My-Topic');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('acme:My-Topic', $id->toString());
        $this->assertSame('acme/My-Topic', $id->toFilePath());
        $this->assertTrue($id->equals(StreamId::fromFilePath($id->toFilePath())));
        $this->assertSame($id->toString(), StreamId::fromFilePath($id->toFilePath())->toString());

        $id = StreamId::fromString('acme:My-Topic:IS_COOL:0');
        $this->assertSame('acme', $id->getVendor());
        $this->assertSame('acme:My-Topic:IS_COOL:0', $id->toString());
        $this->assertSame('acme/My-Topic/8a/9f/IS_COOL/0', $id->toFilePath());
        $this->assertTrue($id->equals(StreamId::fromFilePath($id->toFilePath())));
        $this->assertSame($id->toString(), StreamId::fromFilePath($id->toFilePath())->toString());
    }

    public function testTooLong(): void
    {
        $this->expectException(AssertionFailed::class);
        StreamId::fromString(str_repeat('a', 256));
    }

    /**
     * @dataProvider getInvalidIds
     *
     * @param string $string
     */
    public function testInvalid(string $string): void
    {
        $this->expectException(InvalidArgumentException::class);
        StreamId::fromString($string);
    }

    public function getInvalidIds(): array
    {
        return [
            ['test::what'],
            ['test::'],
            ['test:::'],
            [':test'],
            ['john@doe.com'],
            ['#hashtag'],
            ['http://www.what.com/'],
            ['test.value:2015/01/01/test:what'],
            ['cool~topic'],
            ['some:thin!@##$%$%&^^&**()-=+'],
            ['some:test%20'],
        ];
    }
}
