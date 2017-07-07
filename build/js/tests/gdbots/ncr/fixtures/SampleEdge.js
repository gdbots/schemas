import GdbotsNcrEdgeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/edge/EdgeV1Mixin';
import GdbotsNcrEdgeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/edge/EdgeV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class SampleEdge extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:tests.schemas.ncr:fixtures:sample-edge:1-0-0', SampleEdge,
      [],
      [
        GdbotsNcrEdgeV1Mixin.create(),
      ]
    );
  }
}

GdbotsNcrEdgeV1Trait(SampleEdge);
MessageResolver.register('gdbots:tests.schemas.ncr:fixtures:sample-edge', SampleEdge);
Object.freeze(SampleEdge);
Object.freeze(SampleEdge.prototype);
