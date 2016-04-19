<?php

namespace Gdbots\Schemas\Pbjx\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Enum\Code;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait;

final class RequestFailedResponseV1 extends AbstractMessage implements
    RequestFailedResponse,
    ResponseV1
  
{
    use ResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx:request:request-failed-response:1-0-0', __CLASS__,
            [
                Fb::create('request', T\MessageType::create())
                    ->className('Gdbots\Schemas\Pbjx\Mixin\Request\Request')
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
                ResponseV1Mixin::create()
            ]
        );
    }
}
