// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/long-text-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class LongTextFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:long-text-field:1-0-0', LongTextFieldV1,
      [
        Fb.create('min_length', T.SmallIntType.create())
          .build(),
        Fb.create('max_length', T.SmallIntType.create())
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(LongTextFieldV1);
MessageResolver.register('gdbots:forms:field:long-text-field', LongTextFieldV1);
Object.freeze(LongTextFieldV1);
Object.freeze(LongTextFieldV1.prototype);
