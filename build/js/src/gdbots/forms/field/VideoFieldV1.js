// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/video-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class VideoFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:video-field:1-0-0', VideoFieldV1,
      [
        Fb.create('max_bytes', T.IntType.create())
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(VideoFieldV1);
MessageResolver.register('gdbots:forms:field:video-field', VideoFieldV1);
Object.freeze(VideoFieldV1);
Object.freeze(VideoFieldV1.prototype);
