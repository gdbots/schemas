// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/age-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class AgeFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:age-field:1-0-0', AgeFieldV1,
      [
        Fb.create('min_age', T.TinyIntType.create())
          .build(),
        Fb.create('max_age', T.TinyIntType.create())
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(AgeFieldV1);
MessageResolver.register('gdbots:forms:field:age-field', AgeFieldV1);
Object.freeze(AgeFieldV1);
Object.freeze(AgeFieldV1.prototype);
