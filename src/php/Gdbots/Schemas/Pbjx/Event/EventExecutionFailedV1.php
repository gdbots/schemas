<?php

namespace Gdbots\Schemas\Pbjx\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Enum\Code;

final class EventExecutionFailedV1 extends AbstractMessage implements
    EventExecutionFailed,
    EventV1
  
{
    use EventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx:event:event-execution-failed:1-0-0', __CLASS__,
            [
                Fb::create('event', T\MessageType::create())
                    ->className('Gdbots\Schemas\Pbjx\Event\Event')
                    ->build(),
                Fb::create('error_code', T\SmallIntType::create())
                    ->withDefault(Code::OK)
                    ->build(),
                Fb::create('error_name', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('error_message', T\TextType::create())
                    ->build()
            ],
            [
                EventV1Mixin::create()
            ]
        );
    }
}
