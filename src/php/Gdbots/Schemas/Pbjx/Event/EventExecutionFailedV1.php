<?php

namespace Gdbots\Schemas\Pbjx\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Enum\Code;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1 as GdbotsPbjxEventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1 as GdbotsPbjxIndexedV1;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1Mixin as GdbotsPbjxIndexedV1Mixin;

final class EventExecutionFailedV1 extends AbstractMessage implements
    EventExecutionFailed,
    GdbotsPbjxEventV1,
    GdbotsPbjxIndexedV1
  
{
    use GdbotsPbjxEventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx:event:event-execution-failed:1-0-1', __CLASS__,
            [
                Fb::create('event', T\MessageType::create())
                    ->className('Gdbots\Schemas\Pbjx\Mixin\Event\Event')
                    ->build(),
                Fb::create('error_code', T\SmallIntType::create())
                    ->withDefault(Code::UNKNOWN)
                    ->build(),
                Fb::create('error_name', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('error_message', T\TextType::create())
                    ->build(),
                Fb::create('prev_error_message', T\TextType::create())
                    ->build(),
                Fb::create('stack_trace', T\TextType::create())
                    ->build()
            ],
            [
                GdbotsPbjxEventV1Mixin::create(), 
                GdbotsPbjxIndexedV1Mixin::create()
            ]
        );
    }
}
