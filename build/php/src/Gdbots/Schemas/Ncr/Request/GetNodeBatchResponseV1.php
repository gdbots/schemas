<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-batch-response/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait as GdbotsPbjxResponseV1Trait;

final class GetNodeBatchResponseV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:request:get-node-batch-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:request:get-node-batch-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:request:get-node-batch-response:v1';

    const MIXINS = [
      'gdbots:pbjx:mixin:response:v1',
      'gdbots:pbjx:mixin:response',
      'gdbots:ncr:mixin:get-node-batch-response:v1',
      'gdbots:ncr:mixin:get-node-batch-response',
    ];

    const RESPONSE_ID_FIELD = 'response_id';
    const CREATED_AT_FIELD = 'created_at';
    const CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
    const CTX_REQUEST_REF_FIELD = 'ctx_request_ref';
    const CTX_REQUEST_FIELD = 'ctx_request';
    const CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
    const DEREFS_FIELD = 'derefs';
    const LINKS_FIELD = 'links';
    const METAS_FIELD = 'metas';
    const NODES_FIELD = 'nodes';
    const MISSING_NODE_REFS_FIELD = 'missing_node_refs';

    const FIELDS = [
      self::RESPONSE_ID_FIELD,
      self::CREATED_AT_FIELD,
      self::CTX_TENANT_ID_FIELD,
      self::CTX_REQUEST_REF_FIELD,
      self::CTX_REQUEST_FIELD,
      self::CTX_CORRELATOR_REF_FIELD,
      self::DEREFS_FIELD,
      self::LINKS_FIELD,
      self::METAS_FIELD,
      self::NODES_FIELD,
      self::MISSING_NODE_REFS_FIELD,
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
                /*
                 * Multi-tenant apps can use this field to track the tenant id.
                 */
                Fb::create(self::CTX_TENANT_ID_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
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
                Fb::create(self::NODES_FIELD, T\MessageType::create())
                    ->asAMap()
                    ->anyOfCuries([
                        'gdbots:ncr:mixin:node',
                    ])
                    ->overridable(true)
                    ->build(),
                /*
                 * The "missing_node_refs" field contains a set of node_refs that
                 * the batch request failed to retrieve.
                 */
                Fb::create(self::MISSING_NODE_REFS_FIELD, T\NodeRefType::create())
                    ->asASet()
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
