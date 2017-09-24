<?php
declare(strict_types=1);

namespace Gdbots\Tests\Schemas\Files;

use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Files\FileId;
use PHPUnit\Framework\TestCase;

class FileIdTest extends TestCase
{
    public function testFromString()
    {
        $id = FileId::fromString('image_jpg_20151201_cb9c3c8c5c88453b960933a59ede6505');

        $this->assertSame('image', $id->getType());
        $this->assertSame('jpg', $id->getExt());
        $this->assertSame(
            UuidIdentifier::fromString('cb9c3c8c-5c88-453b-9609-33a59ede6505')->toString(),
            UuidIdentifier::fromString($id->getUuid())->toString()
        );
        $this->assertSame('image/cb/2015/12/01/cb9c3c8c5c88453b960933a59ede6505.jpg', $id->toFilePath());
        $this->assertSame('image/cb/o/2015/12/01/cb9c3c8c5c88453b960933a59ede6505.jpg', $id->toFilePath('o'));

        FileId::useLegacyFilePath();
        $this->assertSame('image/2015/12/01/cb/cb9c3c8c5c88453b960933a59ede6505.jpg', $id->toFilePath());
        $this->assertSame('image/o/2015/12/01/cb/cb9c3c8c5c88453b960933a59ede6505.jpg', $id->toFilePath('o'));
        FileId::useLegacyFilePath(false);
    }

    public function testCreate()
    {
        $id = FileId::create('image', 'jpg', \DateTime::createFromFormat('Ymd', '20151201'), UuidIdentifier::fromString('cb9c3c8c-5c88-453b-9609-33a59ede6505'));

        $this->assertSame('image', $id->getType());
        $this->assertSame('jpg', $id->getExt());
        $this->assertSame(
            UuidIdentifier::fromString('cb9c3c8c-5c88-453b-9609-33a59ede6505')->toString(),
            UuidIdentifier::fromString($id->getUuid())->toString()
        );
        $this->assertSame('image/cb/2015/12/01/cb9c3c8c5c88453b960933a59ede6505.jpg', $id->toFilePath());
        $this->assertSame('image/cb/250x/2015/12/01/cb9c3c8c5c88453b960933a59ede6505_n.jpg', $id->toFilePath('250x', 'n'));

        FileId::useLegacyFilePath();
        $this->assertSame('image/2015/12/01/cb/cb9c3c8c5c88453b960933a59ede6505.jpg', $id->toFilePath());
        $this->assertSame('image/250x/2015/12/01/cb/cb9c3c8c5c88453b960933a59ede6505_n.jpg', $id->toFilePath('250x', 'n'));
        FileId::useLegacyFilePath(false);
    }

    public function testGenerate()
    {
        $date = new \DateTime();
        $id = FileId::create('image', 'jpg');

        $this->assertSame('image', $id->getType());
        $this->assertSame('jpg', $id->getExt());
        $this->assertSame(
            sprintf(
                'image/%s/%s/%s.jpg',
                substr($id->getUuid(), 0, 2),
                $date->format('Y/m/d'),
                $id->getUuid()
            ),
            $id->toFilePath()
        );

        FileId::useLegacyFilePath();
        $this->assertSame(
            sprintf(
                'image/%s/%s/%s.jpg',
                $date->format('Y/m/d'),
                substr($id->getUuid(), 0, 2),
                $id->getUuid()
            ),
            $id->toFilePath()
        );
        FileId::useLegacyFilePath(false);

        $this->assertInstanceOf(UuidIdentifier::class, UuidIdentifier::fromString($id->getUuid(true)));
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
