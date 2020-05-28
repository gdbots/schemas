// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/node-renamed/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class NodeRenamedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:event:node-renamed:1-0-0', NodeRenamedV1,
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
        GdbotsPbjxEventV1Mixin.create(),
        GdbotsAnalyticsTrackedMessageV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
        GdbotsEnrichmentsIpToGeoV1Mixin.create(),
        GdbotsEnrichmentsTimePartingV1Mixin.create(),
        GdbotsEnrichmentsTimeSamplingV1Mixin.create(),
        GdbotsEnrichmentsUaParserV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(NodeRenamedV1);
MessageResolver.register('gdbots:ncr:event:node-renamed', NodeRenamedV1);
Object.freeze(NodeRenamedV1);
Object.freeze(NodeRenamedV1.prototype);
