// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/rename-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class RenameNodeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:rename-node:1-0-0', RenameNodeV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        Fb.create('node_status', T.StringEnumType.create())
          .classProto(NodeStatus)
          .build(),
        Fb.create('new_slug', T.StringType.create())
          .format(Format.SLUG)
          .build(),
        Fb.create('old_slug', T.StringType.create())
          .format(Format.SLUG)
          .build(),
      ],
      [
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(RenameNodeV1);
MessageResolver.register('gdbots:ncr:command:rename-node', RenameNodeV1);
Object.freeze(RenameNodeV1);
Object.freeze(RenameNodeV1.prototype);
