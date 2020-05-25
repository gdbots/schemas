<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/request/request-failed-response/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait as GdbotsPbjxResponseV1Trait;

final class RequestFailedResponseV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx:request:request-failed-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:pbjx:request:request-failed-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:request:request-failed-response:v1';

    const MIXINS = [
      'gdbots:pbjx:mixin:response:v1',
      'gdbots:pbjx:mixin:response',
    ];

    const RESPONSE_ID_FIELD = 'response_id';
    const CREATED_AT_FIELD = 'created_at';
    const CTX_REQUEST_REF_FIELD = 'ctx_request_ref';
    const CTX_REQUEST_FIELD = 'ctx_request';
    const CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
    const DEREFS_FIELD = 'derefs';
    const LINKS_FIELD = 'links';
    const METAS_FIELD = 'metas';
    const ERROR_CODE_FIELD = 'error_code';
    const ERROR_NAME_FIELD = 'error_name';
    const ERROR_MESSAGE_FIELD = 'error_message';
    const PREV_ERROR_MESSAGE_FIELD = 'prev_error_message';
    const STACK_TRACE_FIELD = 'stack_trace';

    const FIELDS = [
      self::RESPONSE_ID_FIELD,
      self::CREATED_AT_FIELD,
      self::CTX_REQUEST_REF_FIELD,
      self::CTX_REQUEST_FIELD,
      self::CTX_CORRELATOR_REF_FIELD,
      self::DEREFS_FIELD,
      self::LINKS_FIELD,
      self::METAS_FIELD,
      self::ERROR_CODE_FIELD,
      self::ERROR_NAME_FIELD,
      self::ERROR_MESSAGE_FIELD,
      self::PREV_ERROR_MESSAGE_FIELD,
      self::STACK_TRACE_FIELD,
    ];

    use GdbotsPbjxResponseV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::RESPONSE_ID_FIELD, T\UuidType::create())
                    ->required()
                    ->build(),
                Fb::create(self::CREATED_AT_FIELD, T\MicrotimeType::create())
                    ->build(),
                Fb::create(self::CTX_REQUEST_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                /*
                 * The "ctx_request" is the actual request object that "ctx_request_ref" refers to.
                 * In some cases it's useful for request handlers to copy the request into the response
                 * so the requestor has everything in one message. This will NOT always be populated.
                 * A common use case is search request/response cycles where you want to know what the
                 * search criteria was so you can render that along with the results.
                 */
                Fb::create(self::CTX_REQUEST_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:pbjx:mixin:request',
                    ])
                    ->build(),
                Fb::create(self::CTX_CORRELATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                /*
                 * Responses can include "dereferenced" messages to prevent
                 * the consumer from needing to make multiple HTTP requests.
                 * It is up to the consumer to make use of the dereferenced
                 * messages if/when they are provided.
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
                Fb::create(self::ERROR_CODE_FIELD, T\SmallIntType::create())
                    ->withDefault(2)
                    ->build(),
                Fb::create(self::ERROR_NAME_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create(self::ERROR_MESSAGE_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::PREV_ERROR_MESSAGE_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::STACK_TRACE_FIELD, T\TextType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
