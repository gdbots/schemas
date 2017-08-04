// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/yes-no-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class YesNoFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:yes-no-field:1-0-0', YesNoFieldV1,
      [
        Fb.create('yes_label', T.StringType.create())
          .build(),
        Fb.create('no_label', T.StringType.create())
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(YesNoFieldV1);
MessageResolver.register('gdbots:forms:field:yes-no-field', YesNoFieldV1);
Object.freeze(YesNoFieldV1);
Object.freeze(YesNoFieldV1.prototype);
