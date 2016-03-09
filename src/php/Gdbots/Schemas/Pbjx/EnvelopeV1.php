<?php

namespace Gdbots\Schemas\Pbjx;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Enum\Code;
use Gdbots\Schemas\Pbjx\Enum\HttpStatusCode;

final class EnvelopeV1 extends AbstractMessage implements
    Envelope
{

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx::envelope:1-0-0', __CLASS__,
            [
                Fb::create('envelope_id', T\UuidType::create())
                    ->required()
                    ->build(),
                Fb::create('ok', T\BooleanType::create())
                    ->withDefault(true)
                    ->build(),
                Fb::create('code', T\IntEnumType::create())
                    ->withDefault(Code::OK())
                    ->className('Gdbots\Schemas\Pbjx\Enum\Code')
                    ->build(),
                Fb::create('http_status_code', T\IntEnumType::create())
                    ->withDefault(HttpStatusCode::HTTP_OK())
                    ->className('Gdbots\Schemas\Pbjx\Enum\HttpStatusCode')
                    ->build(),
                Fb::create('etag', T\StringType::create())
                    ->maxLength(100)
                    ->pattern('/^[A-Za-z0-9_\-]+$/')
                    ->build(),
                Fb::create('error_name', T\StringType::create())
                    ->pattern('/^[A-Za-z0-9_\.:-]+$/')
                    ->build(),
                Fb::create('error_message', T\TextType::create())
                    ->build(),
                Fb::create('message_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('message', T\MessageType::create())
                    ->className('Gdbots\Pbj\Message')
                    ->build()
            ]
        );
    }

    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('envelope_id'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return ['envelope_id' => (string)$this->get('envelope_id')];
    }
}
