<?php

namespace Gdbots\Tests\Schemas\Files;

use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Files\FileId;

class FileIdTest extends \PHPUnit_Framework_TestCase
{
    public function testFromString()
    {
        $id = FileId::fromString('image_jpg_cb9c3c8c5c88453b960933a59ede6505');

        $this->assertSame('image', $id->getType());
        $this->assertSame('jpg', $id->getExt());
        $this->assertSame(UuidIdentifier::fromString('cb9c3c8c-5c88-453b-9609-33a59ede6505')->toString(), $id->getUuid()->toString());
        $this->assertSame('cb/9c/3c', $id->getDirHash());
    }

    public function testCreate()
    {
        $id = FileId::create('image', 'jpg', UuidIdentifier::fromString('cb9c3c8c-5c88-453b-9609-33a59ede6505'));

        $this->assertSame('image', $id->getType());
        $this->assertSame('jpg', $id->getExt());
        $this->assertSame(UuidIdentifier::fromString('cb9c3c8c-5c88-453b-9609-33a59ede6505')->toString(), $id->getUuid()->toString());
        $this->assertSame('cb/9c/3c', $id->getDirHash());
    }

    public function testGenerate()
    {
        $id = FileId::create('image', 'jpg');

        $this->assertSame('image', $id->getType());
        $this->assertSame('jpg', $id->getExt());
        $this->assertInstanceOf('Gdbots\Pbj\WellKnown\UuidIdentifier', $id->getUuid());
    }

    /**
     * @expectedException \Gdbots\Pbj\Exception\AssertionFailed
     */
    public function testTooLong()
    {
        FileId::fromString(str_repeat('a', 57));
    }

    /**
     * @dataProvider getInvalidIds
     * @expectedException \Gdbots\Pbj\Exception\AssertionFailed
     *
     * @param string $string
     */
    public function testInvalid($string)
    {
        FileId::fromString($string);
    }

    /**
     * @return array
     */
    public function getInvalidIds()
    {
        return [
            ['test::what'],
            ['superlongtype_reallylongextension_invaliduuid'],
            ['image_jpg_invaliduuid'],
            ['__cb9c3c8c-5c88-453b-9609-33a59ede6505'],
            ['__cb9c3c8c5c88453b960933a59ede6505'],
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
