// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/youtube-user-field/1-0-0.json#
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class YoutubeUserFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:youtube-user-field:1-0-0', YoutubeUserFieldV1,
      [],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

MessageResolver.register('gdbots:forms:field:youtube-user-field', YoutubeUserFieldV1);
Object.freeze(YoutubeUserFieldV1);
Object.freeze(YoutubeUserFieldV1.prototype);
