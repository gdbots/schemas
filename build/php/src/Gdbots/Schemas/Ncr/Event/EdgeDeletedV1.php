<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/edge-deleted/1-0-1.json#
namespace Gdbots\Schemas\Ncr\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Enum\DayOfWeek;
use Gdbots\Schemas\Common\Enum\Month;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;

final class EdgeDeletedV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:event:edge-deleted:1-0-1';
    const SCHEMA_CURIE = 'gdbots:ncr:event:edge-deleted';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:event:edge-deleted:v1';

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

    const EVENT_ID_FIELD = 'event_id';
    const OCCURRED_AT_FIELD = 'occurred_at';
    const CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
    const CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
    const CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
    const CTX_USER_REF_FIELD = 'ctx_user_ref';
    const CTX_APP_FIELD = 'ctx_app';
    const CTX_CLOUD_FIELD = 'ctx_cloud';
    const CTX_IP_FIELD = 'ctx_ip';
    const CTX_IPV6_FIELD = 'ctx_ipv6';
    const CTX_UA_FIELD = 'ctx_ua';
    const CTX_MSG_FIELD = 'ctx_msg';
    const TAGS_FIELD = 'tags';
    const CTX_IP_GEO_FIELD = 'ctx_ip_geo';
    const MONTH_OF_YEAR_FIELD = 'month_of_year';
    const DAY_OF_MONTH_FIELD = 'day_of_month';
    const DAY_OF_WEEK_FIELD = 'day_of_week';
    const IS_WEEKEND_FIELD = 'is_weekend';
    const HOUR_OF_DAY_FIELD = 'hour_of_day';
    const TS_YMDH_FIELD = 'ts_ymdh';
    const TS_YMD_FIELD = 'ts_ymd';
    const TS_YM_FIELD = 'ts_ym';
    const CTX_UA_PARSED_FIELD = 'ctx_ua_parsed';
    const EDGE_FIELD = 'edge';

    const FIELDS = [
      self::EVENT_ID_FIELD,
      self::OCCURRED_AT_FIELD,
      self::CTX_TENANT_ID_FIELD,
      self::CTX_CAUSATOR_REF_FIELD,
      self::CTX_CORRELATOR_REF_FIELD,
      self::CTX_USER_REF_FIELD,
      self::CTX_APP_FIELD,
      self::CTX_CLOUD_FIELD,
      self::CTX_IP_FIELD,
      self::CTX_IPV6_FIELD,
      self::CTX_UA_FIELD,
      self::CTX_MSG_FIELD,
      self::TAGS_FIELD,
      self::CTX_IP_GEO_FIELD,
      self::MONTH_OF_YEAR_FIELD,
      self::DAY_OF_MONTH_FIELD,
      self::DAY_OF_WEEK_FIELD,
      self::IS_WEEKEND_FIELD,
      self::HOUR_OF_DAY_FIELD,
      self::TS_YMDH_FIELD,
      self::TS_YMD_FIELD,
      self::TS_YM_FIELD,
      self::CTX_UA_PARSED_FIELD,
      self::EDGE_FIELD,
    ];

    use GdbotsPbjxEventV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::EVENT_ID_FIELD, T\TimeUuidType::create())
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
                Fb::create(self::CTX_CAUSATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::CTX_CORRELATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::CTX_USER_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                /*
                 * The "ctx_app" refers to the application used to send the command which
                 * in turn resulted in this event being published.
                 */
                Fb::create(self::CTX_APP_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                /*
                 * The "ctx_cloud" is usually copied from the command that resulted in this
                 * event being published. This means the value most likely refers to the cloud
                 * that received the command originally, not the machine processing the event.
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
                 * An optional message/reason for the event being created.
                 * Consider this like a git commit message.
                 */
                Fb::create(self::CTX_MSG_FIELD, T\TextType::create())
                    ->build(),
                /*
                 * Tags is a map that categorizes data or tracks references in
                 * external systems. The tags names should be consistent and descriptive,
                 * e.g. fb_user_id:123, salesforce_customer_id:456.
                 */
                Fb::create(self::TAGS_FIELD, T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create(self::CTX_IP_GEO_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:geo::address',
                    ])
                    ->build(),
                Fb::create(self::MONTH_OF_YEAR_FIELD, T\IntEnumType::create())
                    ->withDefault(Month::UNKNOWN())
                    ->className(Month::class)
                    ->build(),
                Fb::create(self::DAY_OF_MONTH_FIELD, T\TinyIntType::create())
                    ->max(31)
                    ->build(),
                Fb::create(self::DAY_OF_WEEK_FIELD, T\IntEnumType::create())
                    ->withDefault(DayOfWeek::UNKNOWN())
                    ->className(DayOfWeek::class)
                    ->build(),
                Fb::create(self::IS_WEEKEND_FIELD, T\BooleanType::create())
                    ->build(),
                Fb::create(self::HOUR_OF_DAY_FIELD, T\TinyIntType::create())
                    ->max(23)
                    ->build(),
                Fb::create(self::TS_YMDH_FIELD, T\IntType::create())
                    ->build(),
                Fb::create(self::TS_YMD_FIELD, T\IntType::create())
                    ->build(),
                Fb::create(self::TS_YM_FIELD, T\MediumIntType::create())
                    ->build(),
                Fb::create(self::CTX_UA_PARSED_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::user-agent',
                    ])
                    ->build(),
                Fb::create(self::EDGE_FIELD, T\MessageType::create())
                    ->required()
                    ->anyOfCuries([
                        'gdbots:ncr:mixin:edge',
                    ])
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
