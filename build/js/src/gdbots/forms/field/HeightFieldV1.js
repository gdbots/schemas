// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/height-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class HeightFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:height-field:1-0-0', HeightFieldV1,
      [
        /*
         * The person's minimum physical height recorded in inches.
         */
        Fb.create('min_height', T.TinyIntType.create())
          .build(),
        /*
         * The person's maximum physical height recorded in inches.
         */
        Fb.create('max_height', T.TinyIntType.create())
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(HeightFieldV1);
MessageResolver.register('gdbots:forms:field:height-field', HeightFieldV1);
Object.freeze(HeightFieldV1);
Object.freeze(HeightFieldV1.prototype);
