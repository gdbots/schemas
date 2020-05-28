// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/node-deleted/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class NodeDeletedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:event:node-deleted:1-0-0', NodeDeletedV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        Fb.create('slug', T.StringType.create())
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

GdbotsPbjxEventV1Trait(NodeDeletedV1);
MessageResolver.register('gdbots:ncr:event:node-deleted', NodeDeletedV1);
Object.freeze(NodeDeletedV1);
Object.freeze(NodeDeletedV1.prototype);
