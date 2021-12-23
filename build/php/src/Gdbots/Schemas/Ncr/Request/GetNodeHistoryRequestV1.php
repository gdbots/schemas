<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-history-request/1-0-1.json#
namespace Gdbots\Schemas\Ncr\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin as GdbotsPbjxRequestV1Mixin;

final class GetNodeHistoryRequestV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:request:get-node-history-request:1-0-1';
    const SCHEMA_CURIE = 'gdbots:ncr:request:get-node-history-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:request:get-node-history-request:v1';
    const MIXINS = [
      'gdbots:pbjx:mixin:request:v1',
      'gdbots:pbjx:mixin:request',
    ];

    use GdbotsPbjxRequestV1Mixin;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('request_id', T\UuidType::create())
                    ->required()
                    ->build(),
                Fb::create('occurred_at', T\MicrotimeType::create())
                    ->build(),
                /*
                 * Multi-tenant apps can use this field to track the tenant id.
                 */
                Fb::create('ctx_tenant_id', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                /*
                 * The "ctx_retries" field is used to keep track of how many attempts were
                 * made to handle this request. In some cases, the service or transport
                 * that handles the request may be down or over capacity and is being retried.
                 */
                Fb::create('ctx_retries', T\TinyIntType::create())
                    ->build(),
                Fb::create('ctx_causator_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('ctx_correlator_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('ctx_user_ref', T\MessageRefType::create())
                    ->build(),
                /*
                 * The "ctx_app" refers to the application used to make the request. This is
                 * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
                 * is not necessarily the app used (cms, iOS app, website)
                 */
                Fb::create('ctx_app', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                /*
                 * The "ctx_cloud" is set by the server making the request and is generally
                 * only used internally for tracking and performance monitoring.
                 */
                Fb::create('ctx_cloud', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::cloud',
                    ])
                    ->build(),
                Fb::create('ctx_ip', T\StringType::create())
                    ->format(Format::IPV4)
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ipv6', T\StringType::create())
                    ->format(Format::IPV6)
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ua', T\TextType::create())
                    ->overridable(true)
                    ->build(),
                /*
                 * Field names to dereference, this serves as a hint to the server and is not
                 * necessarily gauranteed since authorization, availability, etc. are determined
                 * by the server not the client.
                 */
                Fb::create('derefs', T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create('node_ref', T\NodeRefType::create())
                    ->required()
                    ->build(),
                /*
                 * Return events since this time (exclusive greater than if forward=true, less than if forward=false)
                 */
                Fb::create('since', T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build(),
                /*
                 * The number of events to return.
                 */
                Fb::create('count', T\TinyIntType::create())
                    ->withDefault(25)
                    ->build(),
                /*
                 * When true, the events are read from oldest to newest, otherwise newest to oldest.
                 */
                Fb::create('forward', T\BooleanType::create())
                    ->build(),
                Fb::create('topic', T\StringType::create())
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create('partition', T\StringType::create())
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create('sub_partition', T\StringType::create())
                    ->pattern('^[\w\.-]+$')
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
