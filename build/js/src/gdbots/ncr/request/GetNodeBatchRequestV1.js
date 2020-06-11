// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-batch-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class GetNodeBatchRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.REQUEST_ID_FIELD, T.UuidType.create())
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
        /*
         * The "ctx_retries" field is used to keep track of how many attempts were
         * made to handle this request. In some cases, the service or transport
         * that handles the request may be down or over capacity and is being retried.
         */
        Fb.create(this.CTX_RETRIES_FIELD, T.TinyIntType.create())
          .build(),
        Fb.create(this.CTX_CAUSATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.CTX_CORRELATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.CTX_USER_REF_FIELD, T.MessageRefType.create())
          .build(),
        /*
         * The "ctx_app" refers to the application used to make the request. This is
         * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
         * is not necessarily the app used (cms, iOS app, website)
         */
        Fb.create(this.CTX_APP_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::app',
          ])
          .build(),
        /*
         * The "ctx_cloud" is set by the server making the request and is generally
         * only used internally for tracking and performance monitoring.
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
         * Field names to dereference, this serves as a hint to the server and is not
         * necessarily gauranteed since authorization, availability, etc. are determined
         * by the server not the client.
         */
        Fb.create(this.DEREFS_FIELD, T.StringType.create())
          .asASet()
          .pattern('^[\\w\\.-]+$')
          .build(),
        /*
         * If true, a strongly consistent read is used; if false (the default), an eventually consistent read is used.
         */
        Fb.create(this.CONSISTENT_READ_FIELD, T.BooleanType.create())
          .build(),
        Fb.create(this.NODE_REFS_FIELD, T.NodeRefType.create())
          .asASet()
          .build(),
        /*
         * Context is a map of data that helps the NCR decide where to read/write data from.
         * A common use case is multi-tenant applications.
         */
        Fb.create(this.CONTEXT_FIELD, T.StringType.create())
          .asAMap()
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = GetNodeBatchRequestV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:ncr:request:get-node-batch-request:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:ncr:request:get-node-batch-request';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:request:get-node-batch-request:v1';

M.prototype.MIXINS = M.MIXINS = [
  'gdbots:pbjx:mixin:request:v1',
  'gdbots:pbjx:mixin:request',
  'gdbots:ncr:mixin:get-node-batch-request:v1',
  'gdbots:ncr:mixin:get-node-batch-request',
];

M.prototype.REQUEST_ID_FIELD = M.REQUEST_ID_FIELD = 'request_id';
M.prototype.OCCURRED_AT_FIELD = M.OCCURRED_AT_FIELD = 'occurred_at';
M.prototype.CTX_TENANT_ID_FIELD = M.CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
M.prototype.CTX_RETRIES_FIELD = M.CTX_RETRIES_FIELD = 'ctx_retries';
M.prototype.CTX_CAUSATOR_REF_FIELD = M.CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
M.prototype.CTX_CORRELATOR_REF_FIELD = M.CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
M.prototype.CTX_USER_REF_FIELD = M.CTX_USER_REF_FIELD = 'ctx_user_ref';
M.prototype.CTX_APP_FIELD = M.CTX_APP_FIELD = 'ctx_app';
M.prototype.CTX_CLOUD_FIELD = M.CTX_CLOUD_FIELD = 'ctx_cloud';
M.prototype.CTX_IP_FIELD = M.CTX_IP_FIELD = 'ctx_ip';
M.prototype.CTX_IPV6_FIELD = M.CTX_IPV6_FIELD = 'ctx_ipv6';
M.prototype.CTX_UA_FIELD = M.CTX_UA_FIELD = 'ctx_ua';
M.prototype.DEREFS_FIELD = M.DEREFS_FIELD = 'derefs';
M.prototype.CONSISTENT_READ_FIELD = M.CONSISTENT_READ_FIELD = 'consistent_read';
M.prototype.NODE_REFS_FIELD = M.NODE_REFS_FIELD = 'node_refs';
M.prototype.CONTEXT_FIELD = M.CONTEXT_FIELD = 'context';

M.prototype.FIELDS = M.FIELDS = [
  M.REQUEST_ID_FIELD,
  M.OCCURRED_AT_FIELD,
  M.CTX_TENANT_ID_FIELD,
  M.CTX_RETRIES_FIELD,
  M.CTX_CAUSATOR_REF_FIELD,
  M.CTX_CORRELATOR_REF_FIELD,
  M.CTX_USER_REF_FIELD,
  M.CTX_APP_FIELD,
  M.CTX_CLOUD_FIELD,
  M.CTX_IP_FIELD,
  M.CTX_IPV6_FIELD,
  M.CTX_UA_FIELD,
  M.DEREFS_FIELD,
  M.CONSISTENT_READ_FIELD,
  M.NODE_REFS_FIELD,
  M.CONTEXT_FIELD,
];

GdbotsPbjxRequestV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
