<?php

namespace Gdbots\Schemas\Shortcodes\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Request\RequestV1;
use Gdbots\Schemas\Pbjx\Request\RequestV1Mixin;
use Gdbots\Schemas\Pbjx\Request\RequestV1Trait;

final class ParseRequestV1 extends AbstractMessage implements
    ParseRequest,
    RequestV1
  
{
    use RequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:shortcodes:request:parse-request:1-0-0', __CLASS__,
            [
                Fb::create('input', T\TextType::create())
                    ->build()
            ],
            [
                RequestV1Mixin::create()
            ]
        );
    }
}
