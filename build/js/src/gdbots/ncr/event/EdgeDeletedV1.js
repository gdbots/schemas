// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/edge-deleted/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class EdgeDeletedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:event:edge-deleted:1-0-1', EdgeDeletedV1,
      [
        Fb.create('edge', T.MessageType.create())
          .required()
          .anyOfCuries([
            'gdbots:ncr:mixin:edge',
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

GdbotsPbjxEventV1Trait(EdgeDeletedV1);
MessageResolver.register('gdbots:ncr:event:edge-deleted', EdgeDeletedV1);
Object.freeze(EdgeDeletedV1);
Object.freeze(EdgeDeletedV1.prototype);
