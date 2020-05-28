// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/lock-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class LockNodeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:lock-node:1-0-0', LockNodeV1,
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

GdbotsPbjxCommandV1Trait(LockNodeV1);
MessageResolver.register('gdbots:ncr:command:lock-node', LockNodeV1);
Object.freeze(LockNodeV1);
Object.freeze(LockNodeV1.prototype);
