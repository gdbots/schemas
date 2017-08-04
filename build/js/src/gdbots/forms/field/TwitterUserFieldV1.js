// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/twitter-user-field/1-0-0.json#
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class TwitterUserFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:twitter-user-field:1-0-0', TwitterUserFieldV1,
      [],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(TwitterUserFieldV1);
MessageResolver.register('gdbots:forms:field:twitter-user-field', TwitterUserFieldV1);
Object.freeze(TwitterUserFieldV1);
Object.freeze(TwitterUserFieldV1.prototype);
