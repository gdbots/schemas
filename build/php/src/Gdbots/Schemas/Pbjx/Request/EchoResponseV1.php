<?php

namespace Gdbots\Schemas\Pbjx\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1 as GdbotsPbjxResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin as GdbotsPbjxResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait as GdbotsPbjxResponseV1Trait;

final class EchoResponseV1 extends AbstractMessage implements
    EchoResponse,
    GdbotsPbjxResponseV1
  
{
    use GdbotsPbjxResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx:request:echo-response:1-0-0', __CLASS__,
            [
                Fb::create('msg', T\StringType::create())
                    ->build()
            ],
            [
                GdbotsPbjxResponseV1Mixin::create()
            ]
        );
    }
}
