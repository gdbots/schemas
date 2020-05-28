<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/search-users-request/1-0-0.json#
namespace Gdbots\Schemas\Iam\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\Enum\SearchUsersSort;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;

final class SearchUsersRequestV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:iam:request:search-users-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:request:search-users-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:request:search-users-request:v1';

    const MIXINS = [
      'gdbots:pbjx:mixin:request:v1',
      'gdbots:pbjx:mixin:request',
      'gdbots:ncr:mixin:search-nodes-request:v1',
      'gdbots:ncr:mixin:search-nodes-request',
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
    const Q_FIELD = 'q';
    const COUNT_FIELD = 'count';
    const PAGE_FIELD = 'page';
    const AUTOCOMPLETE_FIELD = 'autocomplete';
    const CURSOR_FIELD = 'cursor';
    const STATUS_FIELD = 'status';
    const STATUSES_FIELD = 'statuses';
    const CREATED_AFTER_FIELD = 'created_after';
    const CREATED_BEFORE_FIELD = 'created_before';
    const UPDATED_AFTER_FIELD = 'updated_after';
    const UPDATED_BEFORE_FIELD = 'updated_before';
    const PUBLISHED_AFTER_FIELD = 'published_after';
    const PUBLISHED_BEFORE_FIELD = 'published_before';
    const FIELDS_USED_FIELD = 'fields_used';
    const PARSED_QUERY_JSON_FIELD = 'parsed_query_json';
    const SORT_FIELD = 'sort';
    const IS_STAFF_FIELD = 'is_staff';
    const IS_BLOCKED_FIELD = 'is_blocked';

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
      self::Q_FIELD,
      self::COUNT_FIELD,
      self::PAGE_FIELD,
      self::AUTOCOMPLETE_FIELD,
      self::CURSOR_FIELD,
      self::STATUS_FIELD,
      self::STATUSES_FIELD,
      self::CREATED_AFTER_FIELD,
      self::CREATED_BEFORE_FIELD,
      self::UPDATED_AFTER_FIELD,
      self::UPDATED_BEFORE_FIELD,
      self::PUBLISHED_AFTER_FIELD,
      self::PUBLISHED_BEFORE_FIELD,
      self::FIELDS_USED_FIELD,
      self::PARSED_QUERY_JSON_FIELD,
      self::SORT_FIELD,
      self::IS_STAFF_FIELD,
      self::IS_BLOCKED_FIELD,
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
                Fb::create(self::Q_FIELD, T\TextType::create())
                    ->maxLength(2000)
                    ->build(),
                /*
                 * The number of results to return.
                 */
                Fb::create(self::COUNT_FIELD, T\TinyIntType::create())
                    ->withDefault(25)
                    ->build(),
                Fb::create(self::PAGE_FIELD, T\TinyIntType::create())
                    ->min(1)
                    ->withDefault(1)
                    ->build(),
                Fb::create(self::AUTOCOMPLETE_FIELD, T\BooleanType::create())
                    ->build(),
                /*
                 * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
                 * When cursor is present it should be used instead of "page".
                 */
                Fb::create(self::CURSOR_FIELD, T\StringType::create())
                    ->build(),
                /*
                 * The status a node must be in to match the search request.
                 */
                Fb::create(self::STATUS_FIELD, T\StringEnumType::create())
                    ->className(NodeStatus::class)
                    ->build(),
                /*
                 * A set of statuses (node must match at least one) to include in the search results.
                 */
                Fb::create(self::STATUSES_FIELD, T\StringEnumType::create())
                    ->asASet()
                    ->className(NodeStatus::class)
                    ->build(),
                Fb::create(self::CREATED_AFTER_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::CREATED_BEFORE_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::UPDATED_AFTER_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::UPDATED_BEFORE_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::PUBLISHED_AFTER_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::PUBLISHED_BEFORE_FIELD, T\DateTimeType::create())
                    ->build(),
                /*
                 * The fields that are being queried as determined by parsing the "q" field.
                 */
                Fb::create(self::FIELDS_USED_FIELD, T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create(self::PARSED_QUERY_JSON_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::SORT_FIELD, T\StringEnumType::create())
                    ->withDefault(SearchUsersSort::RELEVANCE())
                    ->className(SearchUsersSort::class)
                    ->build(),
                Fb::create(self::IS_STAFF_FIELD, T\TrinaryType::create())
                    ->build(),
                Fb::create(self::IS_BLOCKED_FIELD, T\TrinaryType::create())
                    ->withDefault(2)
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
