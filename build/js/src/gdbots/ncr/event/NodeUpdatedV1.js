// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/node-updated/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class NodeUpdatedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:event:node-updated:1-0-0', NodeUpdatedV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        Fb.create('slug', T.StringType.create())
          .format(Format.SLUG)
          .build(),
        Fb.create('new_etag', T.StringType.create())
          .maxLength(100)
          .pattern('^[\\w\\.:-]+$')
          .build(),
        Fb.create('old_etag', T.StringType.create())
          .maxLength(100)
          .pattern('^[\\w\\.:-]+$')
          .build(),
        Fb.create('new_node', T.MessageType.create())
          .required()
          .anyOfCuries([
            'gdbots:ncr:mixin:node',
          ])
          .build(),
        /*
         * The entire node, as it appeared before it was modified.
         */
        Fb.create('old_node', T.MessageType.create())
          .anyOfCuries([
            'gdbots:ncr:mixin:node',
          ])
          .build(),
        /*
         * The names of the fields this update event should apply changes to.
         * Nested paths can be referenced using dot notation.
         */
        Fb.create('paths', T.StringType.create())
          .asASet()
          .pattern('^[a-zA-Z_]{1}[\\w\\.]*$')
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

GdbotsPbjxEventV1Trait(NodeUpdatedV1);
MessageResolver.register('gdbots:ncr:event:node-updated', NodeUpdatedV1);
Object.freeze(NodeUpdatedV1);
Object.freeze(NodeUpdatedV1.prototype);
