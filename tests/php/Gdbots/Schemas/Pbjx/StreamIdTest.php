<?php

namespace Gdbots\Tests\Schemas\Pbjx;

use Gdbots\Schemas\Pbjx\StreamId;

class StreamIdTest extends \PHPUnit_Framework_TestCase
{
    public function testTopic()
    {
        $id = StreamId::fromString('health-checks');

        $this->assertSame('health-checks', $id->getTopic());
        $this->assertFalse($id->hasPartition(), 'hasPartition should be false.');
        $this->assertNull($id->getPartition(), 'getPartition should be null.');
        $this->assertFalse($id->hasSubPartition(), 'hasSubPartition should be false.');
        $this->assertNull($id->getSubPartition(), 'getSubPartition should be null.');
    }

    public function testPartition()
    {
        $id = StreamId::fromString('bank-account:homer-simpson');

        $this->assertSame('bank-account', $id->getTopic());
        $this->assertTrue($id->hasPartition(), 'hasPartition should be true.');
        $this->assertSame('homer-simpson', $id->getPartition());
        $this->assertFalse($id->hasSubPartition(), 'hasSubPartition should be false.');
        $this->assertNull($id->getSubPartition(), 'getSubPartition should be null.');
    }

    public function testAllParts()
    {
        $id = StreamId::fromString('poll.votes:batman-vs-superman:20160301.c2');

        $this->assertSame('poll.votes', $id->getTopic());
        $this->assertTrue($id->hasPartition(), 'hasPartition should be true.');
        $this->assertSame('batman-vs-superman', $id->getPartition());
        $this->assertTrue($id->hasSubPartition(), 'hasSubPartition should be true.');
        $this->assertSame('20160301.c2', $id->getSubPartition());
    }

    public function testCaseSensitive()
    {
        $id = StreamId::fromString('My-Topic:IS_COOL:BR0.T33n');

        $this->assertSame('My-Topic', $id->getTopic());
        $this->assertTrue($id->hasPartition(), 'hasPartition should be true.');
        $this->assertSame('IS_COOL', $id->getPartition());
        $this->assertTrue($id->hasSubPartition(), 'hasSubPartition should be true.');
        $this->assertSame('BR0.T33n', $id->getSubPartition());
    }

    public function testToSnsTopicName()
    {
        $id = StreamId::fromString('My-Topic:IS_COOL:BR0.T33n');

        $this->assertSame('My-Topic__IS_COOL__BR0--T33n', $id->toSnsTopicName());
        $this->assertTrue($id->equals(StreamId::fromSnsTopicName($id->toSnsTopicName())));
        $this->assertSame($id->toString(), StreamId::fromSnsTopicName($id->toSnsTopicName())->toString());
    }

    public function testToFilePath()
    {
        $id = StreamId::fromString('My-Topic:IS_COOL:BR0.T33n');
        $this->assertSame('My-Topic:IS_COOL:BR0.T33n', $id->toString());
        $this->assertSame('My-Topic/8a/9f/IS_COOL/BR0.T33n', $id->toFilePath());
        $this->assertTrue($id->equals(StreamId::fromFilePath($id->toFilePath())));
        $this->assertSame($id->toString(), StreamId::fromFilePath($id->toFilePath())->toString());

        $id = StreamId::fromString('My-Topic:IS_COOL');
        $this->assertSame('My-Topic:IS_COOL', $id->toString());
        $this->assertSame('My-Topic/8a/9f/IS_COOL', $id->toFilePath());
        $this->assertTrue($id->equals(StreamId::fromFilePath($id->toFilePath())));
        $this->assertSame($id->toString(), StreamId::fromFilePath($id->toFilePath())->toString());

        $id = StreamId::fromString('My-Topic');
        $this->assertSame('My-Topic', $id->toString());
        $this->assertSame('My-Topic', $id->toFilePath());
        $this->assertTrue($id->equals(StreamId::fromFilePath($id->toFilePath())));
        $this->assertSame($id->toString(), StreamId::fromFilePath($id->toFilePath())->toString());

        $id = StreamId::fromString('My-Topic:IS_COOL:0');
        $this->assertSame('My-Topic:IS_COOL:0', $id->toString());
        $this->assertSame('My-Topic/8a/9f/IS_COOL/0', $id->toFilePath());
        $this->assertTrue($id->equals(StreamId::fromFilePath($id->toFilePath())));
        $this->assertSame($id->toString(), StreamId::fromFilePath($id->toFilePath())->toString());
    }

    /**
     * @expectedException \Gdbots\Pbj\Exception\AssertionFailed
     */
    public function testTooLong()
    {
        StreamId::fromString(str_repeat('a', 146));
    }

    /**
     * @dataProvider getInvalidIds
     * @expectedException \Gdbots\Pbj\Exception\InvalidArgumentException
     *
     * @param string $string
     */
    public function testInvalid($string)
    {
        StreamId::fromString($string);
    }

    /**
     * @return array
     */
    public function getInvalidIds()
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
