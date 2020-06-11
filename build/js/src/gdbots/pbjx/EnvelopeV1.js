// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/envelope/1-1-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import HttpCode from '@gdbots/schemas/gdbots/pbjx/enums/HttpCode';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class EnvelopeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.ENVELOPE_ID_FIELD, T.UuidType.create())
          .required()
          .build(),
        Fb.create(this.OK_FIELD, T.BooleanType.create())
          .withDefault(true)
          .build(),
        Fb.create(this.CODE_FIELD, T.SmallIntType.create())
          .withDefault(0)
          .build(),
        Fb.create(this.HTTP_CODE_FIELD, T.IntEnumType.create())
          .withDefault(HttpCode.HTTP_OK)
          .classProto(HttpCode)
          .build(),
        Fb.create(this.ETAG_FIELD, T.StringType.create())
          .maxLength(100)
          .pattern('^[\\w\\.:-]+$')
          .build(),
        Fb.create(this.ERROR_NAME_FIELD, T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create(this.ERROR_MESSAGE_FIELD, T.TextType.create())
          .build(),
        Fb.create(this.MESSAGE_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.MESSAGE_FIELD, T.MessageType.create())
          .build(),
        /*
         * Some pbjx operations (normally requests) can include "dereferenced"
         * messages on the envelope to prevent the consumer from needing to
         * make multiple HTTP requests. It is up to the consumer to make use
         * of the dereferenced messages if/when they are provided.
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
      ],
      this.MIXINS,
    );
  }

  /**
   * @param {?string} tag
   * @returns {MessageRef}
   */
  generateMessageRef(tag = null) {
    return new MessageRef(this.schema().getCurie(), this.get(this.ENVELOPE_ID_FIELD), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return { envelope_id: `${this.get(this.ENVELOPE_ID_FIELD)}` };
  }
}

const M = EnvelopeV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:pbjx::envelope:1-1-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:pbjx::envelope';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx::envelope:v1';

M.prototype.MIXINS = M.MIXINS = [];

M.prototype.ENVELOPE_ID_FIELD = M.ENVELOPE_ID_FIELD = 'envelope_id';
M.prototype.OK_FIELD = M.OK_FIELD = 'ok';
M.prototype.CODE_FIELD = M.CODE_FIELD = 'code';
M.prototype.HTTP_CODE_FIELD = M.HTTP_CODE_FIELD = 'http_code';
M.prototype.ETAG_FIELD = M.ETAG_FIELD = 'etag';
M.prototype.ERROR_NAME_FIELD = M.ERROR_NAME_FIELD = 'error_name';
M.prototype.ERROR_MESSAGE_FIELD = M.ERROR_MESSAGE_FIELD = 'error_message';
M.prototype.MESSAGE_REF_FIELD = M.MESSAGE_REF_FIELD = 'message_ref';
M.prototype.MESSAGE_FIELD = M.MESSAGE_FIELD = 'message';
M.prototype.DEREFS_FIELD = M.DEREFS_FIELD = 'derefs';
M.prototype.LINKS_FIELD = M.LINKS_FIELD = 'links';
M.prototype.METAS_FIELD = M.METAS_FIELD = 'metas';

M.prototype.FIELDS = M.FIELDS = [
  M.ENVELOPE_ID_FIELD,
  M.OK_FIELD,
  M.CODE_FIELD,
  M.HTTP_CODE_FIELD,
  M.ETAG_FIELD,
  M.ERROR_NAME_FIELD,
  M.ERROR_MESSAGE_FIELD,
  M.MESSAGE_REF_FIELD,
  M.MESSAGE_FIELD,
  M.DEREFS_FIELD,
  M.LINKS_FIELD,
  M.METAS_FIELD,
];

Object.freeze(M);
Object.freeze(M.prototype);
