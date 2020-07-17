// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/update-node-labels/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsCommonTaggableV1Mixin from '@gdbots/schemas/gdbots/common/mixin/taggable/TaggableV1Mixin';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class UpdateNodeLabelsV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:command:update-node-labels:1-0-0', UpdateNodeLabelsV1,
      [
        Fb.create('node_ref', T.IdentifierType.create())
          .required()
          .classProto(NodeRef)
          .build(),
        Fb.create('add_labels', T.StringType.create())
          .asASet()
          .pattern('^[\\w-]+$')
          .build(),
        Fb.create('remove_labels', T.StringType.create())
          .asASet()
          .pattern('^[\\w-]+$')
          .build(),
      ],
      [
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(UpdateNodeLabelsV1);
MessageResolver.register('gdbots:ncr:command:update-node-labels', UpdateNodeLabelsV1);
Object.freeze(UpdateNodeLabelsV1);
Object.freeze(UpdateNodeLabelsV1.prototype);
