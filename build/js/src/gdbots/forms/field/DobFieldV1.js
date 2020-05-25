// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/dob-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class DobFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:dob-field:1-0-0', DobFieldV1,
      [
        Fb.create('min_age', T.TinyIntType.create())
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(DobFieldV1);
MessageResolver.register('gdbots:forms:field:dob-field', DobFieldV1);
Object.freeze(DobFieldV1);
Object.freeze(DobFieldV1.prototype);
