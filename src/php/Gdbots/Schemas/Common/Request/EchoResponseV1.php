<?php

namespace Gdbots\Schemas\Common\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait;

final class EchoResponseV1 extends AbstractMessage implements
    EchoResponse,
    ResponseV1
  
{
    use ResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:common:request:echo-response:1-0-0', __CLASS__,
            [
                Fb::create('msg', T\StringType::create())
                    ->build()
            ],
            [
                ResponseV1Mixin::create()
            ]
        );
    }
}
