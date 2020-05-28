// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/unlock-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class UnlockNodeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:unlock-node:1-0-0', UnlockNodeV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
      ],
      [
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(UnlockNodeV1);
MessageResolver.register('gdbots:ncr:command:unlock-node', UnlockNodeV1);
Object.freeze(UnlockNodeV1);
Object.freeze(UnlockNodeV1.prototype);
