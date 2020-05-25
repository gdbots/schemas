<?php
declare(strict_types=1);

use Gdbots\Pbj\Message;
use Gdbots\Pbj\MessageResolver;
use Gdbots\Pbj\Util\ArrayUtil;
use Gdbots\Pbj\WellKnown\MessageRef;
use PHPUnit\Framework\TestCase;

class SchemaTest extends TestCase
{
    public function testCanCreateAllMessages()
    {
        /** @var Message|string $className */
        foreach (MessageResolver::all() as $curie => $className) {
            $message = $className::create();
            $this->assertInstanceOf($className, $message);
            $this->assertInstanceOf(Message::class, $message);

            $ref = $message->generateMessageRef('tag');
            $this->assertInstanceOf(MessageRef::class, $ref);
            $this->assertSame($ref->toString(), $message->generateMessageRef('tag')->toString());

            $this->assertTrue(ArrayUtil::isAssoc($message->getUriTemplateVars()));
        }
    }
}
