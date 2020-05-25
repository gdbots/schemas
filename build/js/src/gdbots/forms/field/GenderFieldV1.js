// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/gender-field/1-0-0.json#
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GenderFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:gender-field:1-0-0', GenderFieldV1,
      [],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(GenderFieldV1);
MessageResolver.register('gdbots:forms:field:gender-field', GenderFieldV1);
Object.freeze(GenderFieldV1);
Object.freeze(GenderFieldV1.prototype);
