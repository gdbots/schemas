// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/mark-node-as-draft/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class MarkNodeAsDraftV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:mark-node-as-draft:1-0-0', MarkNodeAsDraftV1,
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

GdbotsPbjxCommandV1Trait(MarkNodeAsDraftV1);
MessageResolver.register('gdbots:ncr:command:mark-node-as-draft', MarkNodeAsDraftV1);
Object.freeze(MarkNodeAsDraftV1);
Object.freeze(MarkNodeAsDraftV1.prototype);
