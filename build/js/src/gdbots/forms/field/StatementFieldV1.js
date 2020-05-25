// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/statement-field/1-0-0.json#
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class StatementFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:statement-field:1-0-0', StatementFieldV1,
      [],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(StatementFieldV1);
MessageResolver.register('gdbots:forms:field:statement-field', StatementFieldV1);
Object.freeze(StatementFieldV1);
Object.freeze(StatementFieldV1.prototype);
