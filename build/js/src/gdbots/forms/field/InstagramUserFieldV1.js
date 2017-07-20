// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/instagram-user-field/1-0-0.json#
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class InstagramUserFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:instagram-user-field:1-0-0', InstagramUserFieldV1,
      [],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

MessageResolver.register('gdbots:forms:field:instagram-user-field', InstagramUserFieldV1);
Object.freeze(InstagramUserFieldV1);
Object.freeze(InstagramUserFieldV1.prototype);
