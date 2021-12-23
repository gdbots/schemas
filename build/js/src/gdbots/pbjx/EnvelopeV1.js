// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/envelope/1-1-0.json#
import Fb from '@gdbots/pbj/FieldBuilder.js';
import HttpCode from '@gdbots/schemas/gdbots/pbjx/enums/HttpCode.js';
import Message from '@gdbots/pbj/Message.js';
import MessageRef from '@gdbots/pbj/well-known/MessageRef.js';
import Schema from '@gdbots/pbj/Schema.js';
import T from '@gdbots/pbj/types/index.js';

export default class EnvelopeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create('envelope_id', T.UuidType.create())
          .required()
          .build(),
        Fb.create('ok', T.BooleanType.create())
          .withDefault(true)
          .build(),
        Fb.create('code', T.SmallIntType.create())
          .withDefault(0)
          .build(),
        Fb.create('http_code', T.IntEnumType.create())
          .withDefault(HttpCode.HTTP_OK)
          .classProto(HttpCode)
          .build(),
        Fb.create('etag', T.StringType.create())
          .maxLength(100)
          .pattern('^[\\w\\.:-]+$')
          .build(),
        Fb.create('error_name', T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create('error_message', T.TextType.create())
          .build(),
        Fb.create('message_ref', T.MessageRefType.create())
          .build(),
        Fb.create('message', T.MessageType.create())
          .build(),
        /*
         * Some pbjx operations (normally requests) can include "dereferenced"
         * messages on the envelope to prevent the consumer from needing to
         * make multiple HTTP requests. It is up to the consumer to make use
         * of the dereferenced messages if/when they are provided.
         */
        Fb.create('derefs', T.MessageType.create())
          .asAMap()
          .build(),
        /*
         * @link https://en.wikipedia.org/wiki/HATEOAS
         */
        Fb.create('links', T.TextType.create())
          .asAMap()
          .build(),
        Fb.create('metas', T.TextType.create())
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
    return new MessageRef(this.schema().getCurie(), this.get('envelope_id'), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return { envelope_id: `${this.get('envelope_id')}` };
  }
}

const M = EnvelopeV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:pbjx::envelope:1-1-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:pbjx::envelope';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx::envelope:v1';
M.prototype.MIXINS = M.MIXINS = [];

Object.freeze(M);
Object.freeze(M.prototype);
