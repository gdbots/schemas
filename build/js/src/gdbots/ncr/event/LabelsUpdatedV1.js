// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/labels-updated/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class LabelsUpdatedV1 extends Message {
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
         * Labels is a list that categorizes data or tracks references in
         * external systems.
         */
        Fb.create(this.LABELS_FIELD, T.StringType.create())
          .asAList()
          .build(),
        Fb.create(this.LABELS_UPDATED_FIELD, T.StringType.create())
          .asAList()
          .required()
          .build(),
        Fb.create(this.LABELS_REMOVED_FIELD, T.StringType.create())
          .asAList()
          .required()
          .build(),
        Fb.create(this.NEW_ETAG_FIELD, T.StringType.create())
          .maxLength(100)
          .pattern('^[\\w\\.:-]+$')
          .build(),
        Fb.create(this.OLD_ETAG_FIELD, T.StringType.create())
          .maxLength(100)
          .pattern('^[\\w\\.:-]+$')
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = LabelsUpdatedV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:ncr:event:labels-updated:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:ncr:event:labels-updated';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:event:labels-updated:v1';

M.prototype.MIXINS = M.MIXINS = [
  'gdbots:pbjx:mixin:event:v1',
  'gdbots:pbjx:mixin:event',
  'gdbots:common:mixin:labelable:v1',
  'gdbots:common:mixin:labelable',
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
M.prototype.LABELS_FIELD = M.LABELS_FIELD = 'labels';
M.prototype.LABELS_UPDATED_FIELD = M.LABELS_UPDATED_FIELD = 'labels_updated';
M.prototype.LABELS_REMOVED_FIELD = M.LABELS_REMOVED_FIELD = 'labels_removed';
M.prototype.NEW_ETAG_FIELD = M.NEW_ETAG_FIELD = 'new_etag';
M.prototype.OLD_ETAG_FIELD = M.OLD_ETAG_FIELD = 'old_etag';

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
  M.LABELS_FIELD,
  M.LABELS_UPDATED_FIELD,
  M.LABELS_REMOVED_FIELD,
  M.NEW_ETAG_FIELD,
  M.OLD_ETAG_FIELD,
];

GdbotsPbjxEventV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
