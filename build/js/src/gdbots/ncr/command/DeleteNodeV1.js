// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/delete-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class DeleteNodeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:delete-node:1-0-0', DeleteNodeV1,
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

GdbotsPbjxCommandV1Trait(DeleteNodeV1);
MessageResolver.register('gdbots:ncr:command:delete-node', DeleteNodeV1);
Object.freeze(DeleteNodeV1);
Object.freeze(DeleteNodeV1.prototype);
