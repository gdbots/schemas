<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/request/echo-request/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1 as GdbotsPbjxRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin as GdbotsPbjxRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;

final class EchoRequestV1 extends AbstractMessage implements
    EchoRequest,
    GdbotsPbjxRequestV1
{
    use GdbotsPbjxRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx:request:echo-request:1-0-0', __CLASS__,
            [
                Fb::create('msg', T\StringType::create())
                    ->build(),
            ],
            [
                GdbotsPbjxRequestV1Mixin::create(),
            ]
        );
    }
}
