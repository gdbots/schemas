<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-batch-request/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;

final class GetNodeBatchRequestV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:request:get-node-batch-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:request:get-node-batch-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:request:get-node-batch-request:v1';

    const MIXINS = [
      'gdbots:pbjx:mixin:request:v1',
      'gdbots:pbjx:mixin:request',
      'gdbots:ncr:mixin:get-node-batch-request:v1',
      'gdbots:ncr:mixin:get-node-batch-request',
    ];

    const REQUEST_ID_FIELD = 'request_id';
    const OCCURRED_AT_FIELD = 'occurred_at';
    const CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
    const CTX_RETRIES_FIELD = 'ctx_retries';
    const CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
    const CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
    const CTX_USER_REF_FIELD = 'ctx_user_ref';
    const CTX_APP_FIELD = 'ctx_app';
    const CTX_CLOUD_FIELD = 'ctx_cloud';
    const CTX_IP_FIELD = 'ctx_ip';
    const CTX_IPV6_FIELD = 'ctx_ipv6';
    const CTX_UA_FIELD = 'ctx_ua';
    const DEREFS_FIELD = 'derefs';
    const CONSISTENT_READ_FIELD = 'consistent_read';
    const NODE_REFS_FIELD = 'node_refs';
    const CONTEXT_FIELD = 'context';

    const FIELDS = [
      self::REQUEST_ID_FIELD,
      self::OCCURRED_AT_FIELD,
      self::CTX_TENANT_ID_FIELD,
      self::CTX_RETRIES_FIELD,
      self::CTX_CAUSATOR_REF_FIELD,
      self::CTX_CORRELATOR_REF_FIELD,
      self::CTX_USER_REF_FIELD,
      self::CTX_APP_FIELD,
      self::CTX_CLOUD_FIELD,
      self::CTX_IP_FIELD,
      self::CTX_IPV6_FIELD,
      self::CTX_UA_FIELD,
      self::DEREFS_FIELD,
      self::CONSISTENT_READ_FIELD,
      self::NODE_REFS_FIELD,
      self::CONTEXT_FIELD,
    ];

    use GdbotsPbjxRequestV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::REQUEST_ID_FIELD, T\UuidType::create())
                    ->required()
                    ->build(),
                Fb::create(self::OCCURRED_AT_FIELD, T\MicrotimeType::create())
                    ->build(),
                /*
                 * Multi-tenant apps can use this field to track the tenant id.
                 */
                Fb::create(self::CTX_TENANT_ID_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                /*
                 * The "ctx_retries" field is used to keep track of how many attempts were
                 * made to handle this request. In some cases, the service or transport
                 * that handles the request may be down or over capacity and is being retried.
                 */
                Fb::create(self::CTX_RETRIES_FIELD, T\TinyIntType::create())
                    ->build(),
                Fb::create(self::CTX_CAUSATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::CTX_CORRELATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::CTX_USER_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                /*
                 * The "ctx_app" refers to the application used to make the request. This is
                 * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
                 * is not necessarily the app used (cms, iOS app, website)
                 */
                Fb::create(self::CTX_APP_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                /*
                 * The "ctx_cloud" is set by the server making the request and is generally
                 * only used internally for tracking and performance monitoring.
                 */
                Fb::create(self::CTX_CLOUD_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::cloud',
                    ])
                    ->build(),
                Fb::create(self::CTX_IP_FIELD, T\StringType::create())
                    ->format(Format::IPV4())
                    ->overridable(true)
                    ->build(),
                Fb::create(self::CTX_IPV6_FIELD, T\StringType::create())
                    ->format(Format::IPV6())
                    ->overridable(true)
                    ->build(),
                Fb::create(self::CTX_UA_FIELD, T\TextType::create())
                    ->overridable(true)
                    ->build(),
                /*
                 * Field names to dereference, this serves as a hint to the server and is not
                 * necessarily gauranteed since authorization, availability, etc. are determined
                 * by the server not the client.
                 */
                Fb::create(self::DEREFS_FIELD, T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                /*
                 * If true, a strongly consistent read is used; if false (the default), an eventually consistent read is used.
                 */
                Fb::create(self::CONSISTENT_READ_FIELD, T\BooleanType::create())
                    ->build(),
                Fb::create(self::NODE_REFS_FIELD, T\NodeRefType::create())
                    ->asASet()
                    ->build(),
                /*
                 * Context is a map of data that helps the NCR decide where to read/write data from.
                 * A common use case is multi-tenant applications.
                 */
                Fb::create(self::CONTEXT_FIELD, T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
