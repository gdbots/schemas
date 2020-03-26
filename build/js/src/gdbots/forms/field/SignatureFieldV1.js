// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/signature-field/1-0-0.json#
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class SignatureFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:signature-field:1-0-0', SignatureFieldV1,
      [],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(SignatureFieldV1);
MessageResolver.register('gdbots:forms:field:signature-field', SignatureFieldV1);
Object.freeze(SignatureFieldV1);
Object.freeze(SignatureFieldV1.prototype);
