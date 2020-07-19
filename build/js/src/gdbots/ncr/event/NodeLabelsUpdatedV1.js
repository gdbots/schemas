// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/node-labels-updated/1-0-0.json#
import DayOfWeek from '@gdbots/schemas/gdbots/common/enums/DayOfWeek';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import Message from '@gdbots/pbj/Message';
import Month from '@gdbots/schemas/gdbots/common/enums/Month';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class NodeLabelsUpdatedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create('event_id', T.TimeUuidType.create())
          .required()
          .build(),
        Fb.create('occurred_at', T.MicrotimeType.create())
          .build(),
        /*
         * Multi-tenant apps can use this field to track the tenant id.
         */
        Fb.create('ctx_tenant_id', T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create('ctx_causator_ref', T.MessageRefType.create())
          .build(),
        Fb.create('ctx_correlator_ref', T.MessageRefType.create())
          .build(),
        Fb.create('ctx_user_ref', T.MessageRefType.create())
          .build(),
        /*
         * The "ctx_app" refers to the application used to send the command which
         * in turn resulted in this event being published.
         */
        Fb.create('ctx_app', T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::app',
          ])
          .build(),
        /*
         * The "ctx_cloud" is usually copied from the command that resulted in this
         * event being published. This means the value most likely refers to the cloud
         * that received the command originally, not the machine processing the event.
         */
        Fb.create('ctx_cloud', T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::cloud',
          ])
          .build(),
        Fb.create('ctx_ip', T.StringType.create())
          .format(Format.IPV4)
          .overridable(true)
          .build(),
        Fb.create('ctx_ipv6', T.StringType.create())
          .format(Format.IPV6)
          .overridable(true)
          .build(),
        Fb.create('ctx_ua', T.TextType.create())
          .overridable(true)
          .build(),
        /*
         * An optional message/reason for the event being created.
         * Consider this like a git commit message.
         */
        Fb.create('ctx_msg', T.TextType.create())
          .build(),
        /*
         * Tags is a map that categorizes data or tracks references in
         * external systems. The tags names should be consistent and descriptive,
         * e.g. fb_user_id:123, salesforce_customer_id:456.
         */
        Fb.create('tags', T.StringType.create())
          .asAMap()
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create('ctx_ip_geo', T.MessageType.create())
          .anyOfCuries([
            'gdbots:geo::address',
          ])
          .build(),
        Fb.create('month_of_year', T.IntEnumType.create())
          .withDefault(Month.UNKNOWN)
          .classProto(Month)
          .build(),
        Fb.create('day_of_month', T.TinyIntType.create())
          .max(31)
          .build(),
        Fb.create('day_of_week', T.IntEnumType.create())
          .withDefault(DayOfWeek.UNKNOWN)
          .classProto(DayOfWeek)
          .build(),
        Fb.create('is_weekend', T.BooleanType.create())
          .build(),
        Fb.create('hour_of_day', T.TinyIntType.create())
          .max(23)
          .build(),
        Fb.create('ts_ymdh', T.IntType.create())
          .build(),
        Fb.create('ts_ymd', T.IntType.create())
          .build(),
        Fb.create('ts_ym', T.MediumIntType.create())
          .build(),
        Fb.create('ctx_ua_parsed', T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::user-agent',
          ])
          .build(),
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        Fb.create('labels_added', T.StringType.create())
          .asASet()
          .pattern('^[\\w-]+$')
          .build(),
        Fb.create('labels_removed', T.StringType.create())
          .asASet()
          .pattern('^[\\w-]+$')
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = NodeLabelsUpdatedV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:ncr:event:node-labels-updated:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:ncr:event:node-labels-updated';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:event:node-labels-updated:v1';
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

GdbotsPbjxEventV1Mixin(M);

Object.freeze(M);
Object.freeze(M.prototype);
