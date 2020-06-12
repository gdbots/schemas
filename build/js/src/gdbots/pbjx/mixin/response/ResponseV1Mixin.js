// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/response/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class ResponseV1Mixin {
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
      Fb.create(this.RESPONSE_ID_FIELD, T.UuidType.create())
        .required()
        .build(),
      Fb.create(this.CREATED_AT_FIELD, T.MicrotimeType.create())
        .build(),
      /*
       * Multi-tenant apps can use this field to track the tenant id.
       */
      Fb.create(this.CTX_TENANT_ID_FIELD, T.StringType.create())
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create(this.CTX_REQUEST_REF_FIELD, T.MessageRefType.create())
        .build(),
      /*
       * The "ctx_request" is the actual request object that "ctx_request_ref" refers to.
       * In some cases it's useful for request handlers to copy the request into the response
       * so the requestor has everything in one message. This will NOT always be populated.
       * A common use case is search request/response cycles where you want to know what the
       * search criteria was so you can render that along with the results.
       */
      Fb.create(this.CTX_REQUEST_FIELD, T.MessageType.create())
        .anyOfCuries([
          'gdbots:pbjx:mixin:request',
        ])
        .build(),
      Fb.create(this.CTX_CORRELATOR_REF_FIELD, T.MessageRefType.create())
        .build(),
      /*
       * Responses can include "dereferenced" messages to prevent
       * the consumer from needing to make multiple HTTP requests.
       * It is up to the consumer to make use of the dereferenced
       * messages if/when they are provided.
       */
      Fb.create(this.DEREFS_FIELD, T.MessageType.create())
        .asAMap()
        .build(),
      /*
       * @link https://en.wikipedia.org/wiki/HATEOAS
       */
      Fb.create(this.LINKS_FIELD, T.TextType.create())
        .asAMap()
        .build(),
      Fb.create(this.METAS_FIELD, T.TextType.create())
        .asAMap()
        .build(),
    ];
  }
}

const M = ResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:response:1-0-2';
M.SCHEMA_CURIE = 'gdbots:pbjx:mixin:response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:response:v1';

M.RESPONSE_ID_FIELD = 'response_id';
M.CREATED_AT_FIELD = 'created_at';
M.CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
M.CTX_REQUEST_REF_FIELD = 'ctx_request_ref';
M.CTX_REQUEST_FIELD = 'ctx_request';
M.CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
M.DEREFS_FIELD = 'derefs';
M.LINKS_FIELD = 'links';
M.METAS_FIELD = 'metas';

M.FIELDS = [
  M.RESPONSE_ID_FIELD,
  M.CREATED_AT_FIELD,
  M.CTX_TENANT_ID_FIELD,
  M.CTX_REQUEST_REF_FIELD,
  M.CTX_REQUEST_FIELD,
  M.CTX_CORRELATOR_REF_FIELD,
  M.DEREFS_FIELD,
  M.LINKS_FIELD,
  M.METAS_FIELD,
];
