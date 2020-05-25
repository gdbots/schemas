// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/number-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class NumberFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:number-field:1-0-0', NumberFieldV1,
      [
        Fb.create('min_value', T.IntType.create())
          .build(),
        Fb.create('max_value', T.IntType.create())
          .build(),
        /*
         * Number of decimal places to allow. A "0" denotes this number field
         * will require an integer.
         */
        Fb.create('decimals', T.TinyIntType.create())
          .max(6)
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(NumberFieldV1);
MessageResolver.register('gdbots:forms:field:number-field', NumberFieldV1);
Object.freeze(NumberFieldV1);
Object.freeze(NumberFieldV1.prototype);
