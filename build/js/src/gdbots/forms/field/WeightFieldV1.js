// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/weight-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class WeightFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:weight-field:1-0-0', WeightFieldV1,
      [
        Fb.create('weight_units', T.StringType.create())
          .pattern('^(kilograms|pounds)$')
          .withDefault("pounds")
          .build(),
        /*
         * The person's minimum physical weight recorded in pounds or kilograms.
         */
        Fb.create('min_weight', T.SmallIntType.create())
          .build(),
        /*
         * The person's maximum physical weight recorded in pounds or kilograms.
         */
        Fb.create('max_weight', T.SmallIntType.create())
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(WeightFieldV1);
MessageResolver.register('gdbots:forms:field:weight-field', WeightFieldV1);
Object.freeze(WeightFieldV1);
Object.freeze(WeightFieldV1.prototype);
