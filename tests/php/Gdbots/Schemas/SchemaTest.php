<?php

namespace Gdbots\Tests\Schemas;

use Gdbots\Pbj\Message;
use Gdbots\Pbj\MessageResolver;
use PHPUnit\Framework\TestCase;

class SchemaTest extends TestCase
{
    public function testCanCreateAllMessages()
    {
        /** @var \Gdbots\Pbj\Message $className */
        foreach (MessageResolver::all() as $curie => $className) {
            $message = $className::create();
            $this->assertInstanceOf($className, $message);
            $this->assertInstanceOf(Message::class, $message);
        }
    }
}
