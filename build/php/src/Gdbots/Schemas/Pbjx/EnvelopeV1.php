<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/envelope/1-0-1.json#
namespace Gdbots\Schemas\Pbjx;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Enum\HttpCode;

final class EnvelopeV1 extends AbstractMessage implements
    Envelope
{

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx::envelope:1-0-1', __CLASS__,
            [
                Fb::create('envelope_id', T\UuidType::create())
                    ->required()
                    ->build(),
                Fb::create('ok', T\BooleanType::create())
                    ->withDefault(true)
                    ->build(),
                Fb::create('code', T\SmallIntType::create())
                    ->withDefault(0)
                    ->build(),
                Fb::create('http_code', T\IntEnumType::create())
                    ->withDefault(HttpCode::HTTP_OK())
                    ->className(HttpCode::class)
                    ->build(),
                Fb::create('etag', T\StringType::create())
                    ->maxLength(100)
                    ->pattern('^[\w\.:-]+$')
                    ->build(),
                Fb::create('error_name', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('error_message', T\TextType::create())
                    ->build(),
                Fb::create('message_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('message', T\MessageType::create())
                    ->build(),
                /*
                 * Some pbjx operations (normally requests) can include "dereferenced"
                 * messages on the envelope to prevent the consumer from needing to
                 * make multiple HTTP requests. It is up to the consumer to make use
                 * of the dereferenced messages if/when they are provided.
                 */
                Fb::create('derefs', T\MessageType::create())
                    ->asAMap()
                    ->build(),
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
