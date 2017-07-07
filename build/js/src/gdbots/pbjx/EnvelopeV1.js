// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/envelope/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import HttpCode from '@gdbots/schemas/gdbots/pbjx/enums/HttpCode';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/MessageRef';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class EnvelopeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:pbjx::envelope:1-0-1', EnvelopeV1,
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
      ],
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

MessageResolver.register('gdbots:pbjx::envelope', EnvelopeV1);
Object.freeze(EnvelopeV1);
Object.freeze(EnvelopeV1.prototype);
