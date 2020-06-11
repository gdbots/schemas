// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/event/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class EventV1Mixin {
  /**
   * @returns {SchemaId}
   */
  static getId() {
    return SchemaId.fromString(this.SCHEMA_ID);
  }

  /**
   * @param {string} name
   * @returns {boolean}
   */
  static hasField(name) {
    return this.FIELDS.includes(name);
  }

  /**
   * @returns {Field[]}
   */
  static getFields() {
    return [
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
    ];
  }
}

const M = EventV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:event:1-0-2';
M.SCHEMA_CURIE = 'gdbots:pbjx:mixin:event';
M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:event:v1';

M.EVENT_ID_FIELD = 'event_id';
M.OCCURRED_AT_FIELD = 'occurred_at';
M.CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
M.CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
M.CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
M.CTX_USER_REF_FIELD = 'ctx_user_ref';
M.CTX_APP_FIELD = 'ctx_app';
M.CTX_CLOUD_FIELD = 'ctx_cloud';
M.CTX_IP_FIELD = 'ctx_ip';
M.CTX_IPV6_FIELD = 'ctx_ipv6';
M.CTX_UA_FIELD = 'ctx_ua';
M.CTX_MSG_FIELD = 'ctx_msg';

M.FIELDS = [
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
];
