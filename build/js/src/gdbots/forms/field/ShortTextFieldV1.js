// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/short-text-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class ShortTextFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:short-text-field:1-0-0', ShortTextFieldV1,
      [
        Fb.create('min_length', T.TinyIntType.create())
          .build(),
        Fb.create('max_length', T.TinyIntType.create())
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(ShortTextFieldV1);
MessageResolver.register('gdbots:forms:field:short-text-field', ShortTextFieldV1);
Object.freeze(ShortTextFieldV1);
Object.freeze(ShortTextFieldV1.prototype);
