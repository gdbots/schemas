// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/publish-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class PublishNodeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:publish-node:1-0-0', PublishNodeV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        Fb.create('publish_at', T.DateTimeType.create())
          .build(),
      ],
      [
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(PublishNodeV1);
MessageResolver.register('gdbots:ncr:command:publish-node', PublishNodeV1);
Object.freeze(PublishNodeV1);
Object.freeze(PublishNodeV1.prototype);
