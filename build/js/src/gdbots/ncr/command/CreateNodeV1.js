// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/create-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class CreateNodeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:create-node:1-0-0', CreateNodeV1,
      [
        Fb.create('node', T.MessageType.create())
          .required()
          .anyOfCuries([
            'gdbots:ncr:mixin:node',
          ])
          .build(),
      ],
      [
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(CreateNodeV1);
MessageResolver.register('gdbots:ncr:command:create-node', CreateNodeV1);
Object.freeze(CreateNodeV1);
Object.freeze(CreateNodeV1.prototype);
