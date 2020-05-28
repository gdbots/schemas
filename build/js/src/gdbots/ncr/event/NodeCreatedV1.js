// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/node-created/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class NodeCreatedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:event:node-created:1-0-0', NodeCreatedV1,
      [
        Fb.create('node', T.MessageType.create())
          .required()
          .anyOfCuries([
            'gdbots:ncr:mixin:node',
          ])
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

GdbotsPbjxEventV1Trait(NodeCreatedV1);
MessageResolver.register('gdbots:ncr:event:node-created', NodeCreatedV1);
Object.freeze(NodeCreatedV1);
Object.freeze(NodeCreatedV1.prototype);
