// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/node-marked-as-draft/1-0-0.json#
import DayOfWeek from '@gdbots/schemas/gdbots/common/enums/DayOfWeek';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import Month from '@gdbots/schemas/gdbots/common/enums/Month';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class NodeMarkedAsDraftV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.EVENT_ID_FIELD, T.TimeUuidType.create())
          .required()
          .build(),
        Fb.create(this.OCCURRED_AT_FIELD, T.MicrotimeType.create())
          .build(),
        /*
         * Multi-tenant apps can use this field to track the tenant id.
         */
        Fb.create(this.CTX_TENANT_ID_FIELD, T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create(this.CTX_CAUSATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.CTX_CORRELATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.CTX_USER_REF_FIELD, T.MessageRefType.create())
          .build(),
        /*
         * The "ctx_app" refers to the application used to send the command which
         * in turn resulted in this event being published.
         */
        Fb.create(this.CTX_APP_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::app',
          ])
          .build(),
        /*
         * The "ctx_cloud" is usually copied from the command that resulted in this
         * event being published. This means the value most likely refers to the cloud
         * that received the command originally, not the machine processing the event.
         */
        Fb.create(this.CTX_CLOUD_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::cloud',
          ])
          .build(),
        Fb.create(this.CTX_IP_FIELD, T.StringType.create())
          .format(Format.IPV4)
          .overridable(true)
          .build(),
        Fb.create(this.CTX_IPV6_FIELD, T.StringType.create())
          .format(Format.IPV6)
          .overridable(true)
          .build(),
        Fb.create(this.CTX_UA_FIELD, T.TextType.create())
          .overridable(true)
          .build(),
        /*
         * An optional message/reason for the event being created.
         * Consider this like a git commit message.
         */
        Fb.create(this.CTX_MSG_FIELD, T.TextType.create())
          .build(),
        /*
         * Tags is a map that categorizes data or tracks references in
         * external systems. The tags names should be consistent and descriptive,
         * e.g. fb_user_id:123, salesforce_customer_id:456.
         */
        Fb.create(this.TAGS_FIELD, T.StringType.create())
          .asAMap()
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create(this.CTX_IP_GEO_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:geo::address',
          ])
          .build(),
        Fb.create(this.MONTH_OF_YEAR_FIELD, T.IntEnumType.create())
          .withDefault(Month.UNKNOWN)
          .classProto(Month)
          .build(),
        Fb.create(this.DAY_OF_MONTH_FIELD, T.TinyIntType.create())
          .max(31)
          .build(),
        Fb.create(this.DAY_OF_WEEK_FIELD, T.IntEnumType.create())
          .withDefault(DayOfWeek.UNKNOWN)
          .classProto(DayOfWeek)
          .build(),
        Fb.create(this.IS_WEEKEND_FIELD, T.BooleanType.create())
          .build(),
        Fb.create(this.HOUR_OF_DAY_FIELD, T.TinyIntType.create())
          .max(23)
          .build(),
        Fb.create(this.TS_YMDH_FIELD, T.IntType.create())
          .build(),
        Fb.create(this.TS_YMD_FIELD, T.IntType.create())
          .build(),
        Fb.create(this.TS_YM_FIELD, T.MediumIntType.create())
          .build(),
        Fb.create(this.CTX_UA_PARSED_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::user-agent',
          ])
          .build(),
        Fb.create(this.NODE_REF_FIELD, T.NodeRefType.create())
          .required()
          .build(),
        Fb.create(this.SLUG_FIELD, T.StringType.create())
          .format(Format.SLUG)
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = NodeMarkedAsDraftV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:ncr:event:node-marked-as-draft:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:ncr:event:node-marked-as-draft';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:event:node-marked-as-draft:v1';

M.prototype.MIXINS = M.MIXINS = [
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

M.prototype.EVENT_ID_FIELD = M.EVENT_ID_FIELD = 'event_id';
M.prototype.OCCURRED_AT_FIELD = M.OCCURRED_AT_FIELD = 'occurred_at';
M.prototype.CTX_TENANT_ID_FIELD = M.CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
M.prototype.CTX_CAUSATOR_REF_FIELD = M.CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
M.prototype.CTX_CORRELATOR_REF_FIELD = M.CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
M.prototype.CTX_USER_REF_FIELD = M.CTX_USER_REF_FIELD = 'ctx_user_ref';
M.prototype.CTX_APP_FIELD = M.CTX_APP_FIELD = 'ctx_app';
M.prototype.CTX_CLOUD_FIELD = M.CTX_CLOUD_FIELD = 'ctx_cloud';
M.prototype.CTX_IP_FIELD = M.CTX_IP_FIELD = 'ctx_ip';
M.prototype.CTX_IPV6_FIELD = M.CTX_IPV6_FIELD = 'ctx_ipv6';
M.prototype.CTX_UA_FIELD = M.CTX_UA_FIELD = 'ctx_ua';
M.prototype.CTX_MSG_FIELD = M.CTX_MSG_FIELD = 'ctx_msg';
M.prototype.TAGS_FIELD = M.TAGS_FIELD = 'tags';
M.prototype.CTX_IP_GEO_FIELD = M.CTX_IP_GEO_FIELD = 'ctx_ip_geo';
M.prototype.MONTH_OF_YEAR_FIELD = M.MONTH_OF_YEAR_FIELD = 'month_of_year';
M.prototype.DAY_OF_MONTH_FIELD = M.DAY_OF_MONTH_FIELD = 'day_of_month';
M.prototype.DAY_OF_WEEK_FIELD = M.DAY_OF_WEEK_FIELD = 'day_of_week';
M.prototype.IS_WEEKEND_FIELD = M.IS_WEEKEND_FIELD = 'is_weekend';
M.prototype.HOUR_OF_DAY_FIELD = M.HOUR_OF_DAY_FIELD = 'hour_of_day';
M.prototype.TS_YMDH_FIELD = M.TS_YMDH_FIELD = 'ts_ymdh';
M.prototype.TS_YMD_FIELD = M.TS_YMD_FIELD = 'ts_ymd';
M.prototype.TS_YM_FIELD = M.TS_YM_FIELD = 'ts_ym';
M.prototype.CTX_UA_PARSED_FIELD = M.CTX_UA_PARSED_FIELD = 'ctx_ua_parsed';
M.prototype.NODE_REF_FIELD = M.NODE_REF_FIELD = 'node_ref';
M.prototype.SLUG_FIELD = M.SLUG_FIELD = 'slug';

M.prototype.FIELDS = M.FIELDS = [
  M.EVENT_ID_FIELD,
  M.OCCURRED_AT_FIELD,
  M.CTX_TENANT_ID_FIELD,
  M.CTX_CAUSATOR_REF_FIELD,
  M.CTX_CORRELATOR_REF_FIELD,
  M.CTX_USER_REF_FIELD,
  M.CTX_APP_FIELD,
  M.CTX_CLOUD_FIELD,
  M.CTX_IP_FIELD,
  M.CTX_IPV6_FIELD,
  M.CTX_UA_FIELD,
  M.CTX_MSG_FIELD,
  M.TAGS_FIELD,
  M.CTX_IP_GEO_FIELD,
  M.MONTH_OF_YEAR_FIELD,
  M.DAY_OF_MONTH_FIELD,
  M.DAY_OF_WEEK_FIELD,
  M.IS_WEEKEND_FIELD,
  M.HOUR_OF_DAY_FIELD,
  M.TS_YMDH_FIELD,
  M.TS_YMD_FIELD,
  M.TS_YM_FIELD,
  M.CTX_UA_PARSED_FIELD,
  M.NODE_REF_FIELD,
  M.SLUG_FIELD,
];

GdbotsPbjxEventV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
