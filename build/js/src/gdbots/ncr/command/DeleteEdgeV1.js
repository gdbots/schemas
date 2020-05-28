// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/delete-edge/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class DeleteEdgeV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:delete-edge:1-0-1', DeleteEdgeV1,
      [
        Fb.create('edge', T.MessageType.create())
          .required()
          .anyOfCuries([
            'gdbots:ncr:mixin:edge',
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

GdbotsPbjxCommandV1Trait(DeleteEdgeV1);
MessageResolver.register('gdbots:ncr:command:delete-edge', DeleteEdgeV1);
Object.freeze(DeleteEdgeV1);
Object.freeze(DeleteEdgeV1.prototype);
