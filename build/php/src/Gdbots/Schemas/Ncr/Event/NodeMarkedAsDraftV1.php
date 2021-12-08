<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/node-marked-as-draft/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Enum\DayOfWeek;
use Gdbots\Schemas\Common\Enum\Month;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;

final class NodeMarkedAsDraftV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:event:node-marked-as-draft:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:event:node-marked-as-draft';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:event:node-marked-as-draft:v1';
    const MIXINS = [
      'gdbots:pbjx:mixin:event:v1',
      'gdbots:pbjx:mixin:event',
      'gdbots:analytics:mixin:tracked-message:v1',
      'gdbots:analytics:mixin:tracked-message',
      'gdbots:common:mixin:taggable:v1',
      'gdbots:common:mixin:taggable',
      'gdbots:enrichments:mixin:ip-to-geo:v1',
      'gdbots:enrichments:mixin:ip-to-geo',
      'gdbots:enrichments:mixin:time-parting:v1',
      'gdbots:enrichments:mixin:time-parting',
      'gdbots:enrichments:mixin:time-sampling:v1',
      'gdbots:enrichments:mixin:time-sampling',
      'gdbots:enrichments:mixin:ua-parser:v1',
      'gdbots:enrichments:mixin:ua-parser',
    ];

    use GdbotsPbjxEventV1Mixin;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('event_id', T\TimeUuidType::create())
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
                Fb::create('ctx_causator_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('ctx_correlator_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('ctx_user_ref', T\MessageRefType::create())
                    ->build(),
                /*
                 * The "ctx_app" refers to the application used to send the command which
                 * in turn resulted in this event being published.
                 */
                Fb::create('ctx_app', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                /*
                 * The "ctx_cloud" is usually copied from the command that resulted in this
                 * event being published. This means the value most likely refers to the cloud
                 * that received the command originally, not the machine processing the event.
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
                 * An optional message/reason for the event being created.
                 * Consider this like a git commit message.
                 */
                Fb::create('ctx_msg', T\TextType::create())
                    ->build(),
                /*
                 * Tags is a map that categorizes data or tracks references in
                 * external systems. The tags names should be consistent and descriptive,
                 * e.g. fb_user_id:123, salesforce_customer_id:456.
                 */
                Fb::create('tags', T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('ctx_ip_geo', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:geo::address',
                    ])
                    ->build(),
                Fb::create('month_of_year', T\IntEnumType::create())
                    ->withDefault(Month::UNKNOWN)
                    ->className(Month::class)
                    ->build(),
                Fb::create('day_of_month', T\TinyIntType::create())
                    ->max(31)
                    ->build(),
                Fb::create('day_of_week', T\IntEnumType::create())
                    ->withDefault(DayOfWeek::UNKNOWN)
                    ->className(DayOfWeek::class)
                    ->build(),
                Fb::create('is_weekend', T\BooleanType::create())
                    ->build(),
                Fb::create('hour_of_day', T\TinyIntType::create())
                    ->max(23)
                    ->build(),
                Fb::create('ts_ymdh', T\IntType::create())
                    ->build(),
                Fb::create('ts_ymd', T\IntType::create())
                    ->build(),
                Fb::create('ts_ym', T\MediumIntType::create())
                    ->build(),
                Fb::create('ctx_ua_parsed', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::user-agent',
                    ])
                    ->build(),
                Fb::create('node_ref', T\NodeRefType::create())
                    ->required()
                    ->build(),
                Fb::create('slug', T\StringType::create())
                    ->format(Format::SLUG)
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
