// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/select-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SelectFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:select-field:1-0-0', SelectFieldV1,
      [
        Fb.create('option_label', T.StringType.create())
          .asAList()
          .build(),
        Fb.create('option_value', T.StringType.create())
          .asAList()
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(SelectFieldV1);
MessageResolver.register('gdbots:forms:field:select-field', SelectFieldV1);
Object.freeze(SelectFieldV1);
Object.freeze(SelectFieldV1.prototype);
