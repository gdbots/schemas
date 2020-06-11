// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/request/1-0-3.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class RequestV1Mixin {
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
    ];
  }
}

const M = RequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:request:1-0-3';
M.SCHEMA_CURIE = 'gdbots:pbjx:mixin:request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:request:v1';

M.REQUEST_ID_FIELD = 'request_id';
M.OCCURRED_AT_FIELD = 'occurred_at';
M.CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
M.CTX_RETRIES_FIELD = 'ctx_retries';
M.CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
M.CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
M.CTX_USER_REF_FIELD = 'ctx_user_ref';
M.CTX_APP_FIELD = 'ctx_app';
M.CTX_CLOUD_FIELD = 'ctx_cloud';
M.CTX_IP_FIELD = 'ctx_ip';
M.CTX_IPV6_FIELD = 'ctx_ipv6';
M.CTX_UA_FIELD = 'ctx_ua';
M.DEREFS_FIELD = 'derefs';

M.FIELDS = [
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
];
