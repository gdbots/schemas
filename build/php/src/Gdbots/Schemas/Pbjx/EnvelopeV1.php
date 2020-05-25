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

    const ENVELOPE_ID_FIELD = 'envelope_id';
    const OK_FIELD = 'ok';
    const CODE_FIELD = 'code';
    const HTTP_CODE_FIELD = 'http_code';
    const ETAG_FIELD = 'etag';
    const ERROR_NAME_FIELD = 'error_name';
    const ERROR_MESSAGE_FIELD = 'error_message';
    const MESSAGE_REF_FIELD = 'message_ref';
    const MESSAGE_FIELD = 'message';
    const DEREFS_FIELD = 'derefs';
    const LINKS_FIELD = 'links';
    const METAS_FIELD = 'metas';

    const FIELDS = [
      self::ENVELOPE_ID_FIELD,
      self::OK_FIELD,
      self::CODE_FIELD,
      self::HTTP_CODE_FIELD,
      self::ETAG_FIELD,
      self::ERROR_NAME_FIELD,
      self::ERROR_MESSAGE_FIELD,
      self::MESSAGE_REF_FIELD,
      self::MESSAGE_FIELD,
      self::DEREFS_FIELD,
      self::LINKS_FIELD,
      self::METAS_FIELD,
    ];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::ENVELOPE_ID_FIELD, T\UuidType::create())
                    ->required()
                    ->build(),
                Fb::create(self::OK_FIELD, T\BooleanType::create())
                    ->withDefault(true)
                    ->build(),
                Fb::create(self::CODE_FIELD, T\SmallIntType::create())
                    ->withDefault(0)
                    ->build(),
                Fb::create(self::HTTP_CODE_FIELD, T\IntEnumType::create())
                    ->withDefault(HttpCode::HTTP_OK())
                    ->className(HttpCode::class)
                    ->build(),
                Fb::create(self::ETAG_FIELD, T\StringType::create())
                    ->maxLength(100)
                    ->pattern('^[\w\.:-]+$')
                    ->build(),
                Fb::create(self::ERROR_NAME_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create(self::ERROR_MESSAGE_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::MESSAGE_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::MESSAGE_FIELD, T\MessageType::create())
                    ->build(),
                /*
                 * Some pbjx operations (normally requests) can include "dereferenced"
                 * messages on the envelope to prevent the consumer from needing to
                 * make multiple HTTP requests. It is up to the consumer to make use
                 * of the dereferenced messages if/when they are provided.
                 */
                Fb::create(self::DEREFS_FIELD, T\MessageType::create())
                    ->asAMap()
                    ->build(),
                /*
                 * @link https://en.wikipedia.org/wiki/HATEOAS
                 */
                Fb::create(self::LINKS_FIELD, T\TextType::create())
                    ->asAMap()
                    ->build(),
                Fb::create(self::METAS_FIELD, T\TextType::create())
                    ->asAMap()
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget('envelope_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return ['envelope_id' => $this->fget('envelope_id')];
    }
}
