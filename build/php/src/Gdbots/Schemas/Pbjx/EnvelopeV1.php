<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/envelope/1-1-0.json#
namespace Gdbots\Schemas\Pbjx;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\MessageRef;
use Gdbots\Schemas\Pbjx\Enum\HttpCode;

final class EnvelopeV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx::envelope:1-1-0';
    const SCHEMA_CURIE = 'gdbots:pbjx::envelope';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx::envelope:v1';
    const MIXINS = [];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
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
                    ->withDefault(HttpCode::HTTP_OK)
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
                /*
                 * @link https://en.wikipedia.org/wiki/HATEOAS
                 */
                Fb::create('links', T\TextType::create())
                    ->asAMap()
                    ->build(),
                Fb::create('metas', T\TextType::create())
                    ->asAMap()
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget('envelope_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return ['envelope_id' => $this->fget('envelope_id')];
    }
}
