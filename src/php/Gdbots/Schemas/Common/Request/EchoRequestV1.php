<?php

namespace Gdbots\Schemas\Common\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait;

final class EchoRequestV1 extends AbstractMessage implements
    EchoRequest,
    RequestV1
  
{
    use RequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:common:request:echo-request:1-0-0', __CLASS__,
            [
                Fb::create('msg', T\StringType::create())
                    ->build()
            ],
            [
                RequestV1Mixin::create()
            ]
        );
    }
}
