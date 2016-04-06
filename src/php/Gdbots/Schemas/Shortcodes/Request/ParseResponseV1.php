<?php

namespace Gdbots\Schemas\Shortcodes\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Request\ResponseV1;
use Gdbots\Schemas\Pbjx\Request\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Request\ResponseV1Trait;

final class ParseResponseV1 extends AbstractMessage implements
    ParseResponse,
    ResponseV1
  
{
    use ResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:shortcodes:request:parse-response:1-0-0', __CLASS__,
            [
                Fb::create('output', T\TextType::create())
                    ->build(),
                /*
                 * The key of the map (key => shortcode) is the token that will be
                 * present in the output string. For example "{{token1}}" in the output
                 * corresponds to "shortcodes['token1']".
                 */
                Fb::create('shortcodes', T\MessageType::create())
                    ->asAMap()
                    ->className('Gdbots\Schemas\Shortcodes\Shortcode')
                    ->build()
            ],
            [
                ResponseV1Mixin::create()
            ]
        );
    }
}
