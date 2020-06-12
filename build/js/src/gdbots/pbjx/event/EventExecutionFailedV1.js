// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/event/event-execution-failed/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class EventExecutionFailedV1 extends Message {
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
        Fb.create(this.EVENT_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:pbjx:mixin:event',
          ])
          .build(),
        Fb.create(this.ERROR_CODE_FIELD, T.SmallIntType.create())
          .withDefault(2)
          .build(),
        Fb.create(this.ERROR_NAME_FIELD, T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create(this.ERROR_MESSAGE_FIELD, T.TextType.create())
          .build(),
        Fb.create(this.PREV_ERROR_MESSAGE_FIELD, T.TextType.create())
          .build(),
        Fb.create(this.STACK_TRACE_FIELD, T.TextType.create())
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = EventExecutionFailedV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:pbjx:event:event-execution-failed:1-0-1';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:pbjx:event:event-execution-failed';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:event:event-execution-failed:v1';

M.prototype.MIXINS = M.MIXINS = [
  'gdbots:pbjx:mixin:event:v1',
  'gdbots:pbjx:mixin:event',
  'gdbots:pbjx:mixin:indexed:v1',
  'gdbots:pbjx:mixin:indexed',
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
M.prototype.EVENT_FIELD = M.EVENT_FIELD = 'event';
M.prototype.ERROR_CODE_FIELD = M.ERROR_CODE_FIELD = 'error_code';
M.prototype.ERROR_NAME_FIELD = M.ERROR_NAME_FIELD = 'error_name';
M.prototype.ERROR_MESSAGE_FIELD = M.ERROR_MESSAGE_FIELD = 'error_message';
M.prototype.PREV_ERROR_MESSAGE_FIELD = M.PREV_ERROR_MESSAGE_FIELD = 'prev_error_message';
M.prototype.STACK_TRACE_FIELD = M.STACK_TRACE_FIELD = 'stack_trace';

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
  M.EVENT_FIELD,
  M.ERROR_CODE_FIELD,
  M.ERROR_NAME_FIELD,
  M.ERROR_MESSAGE_FIELD,
  M.PREV_ERROR_MESSAGE_FIELD,
  M.STACK_TRACE_FIELD,
];

GdbotsPbjxEventV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
