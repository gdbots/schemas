import GdbotsNcrEdgeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/edge/EdgeV1Mixin.js';
import EdgeMultiplicity from '@gdbots/schemas/gdbots/ncr/enums/EdgeMultiplicity.js';
import Fb from '@gdbots/pbj/FieldBuilder.js';
import Message from '@gdbots/pbj/Message.js';
import MessageResolver from '@gdbots/pbj/MessageResolver.js';
import Schema from '@gdbots/pbj/Schema.js';
import T from '@gdbots/pbj/types/index.js';

export default class SampleEdge extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:tests.schemas.ncr:fixtures:sample-edge:1-0-0', SampleEdge,
      [
        Fb.create('from_ref', T.NodeRefType.create())
          .required()
          .build(),
        Fb.create('to_ref', T.NodeRefType.create())
          .required()
          .build(),
        Fb.create('multiplicity', T.StringEnumType.create())
          .withDefault(EdgeMultiplicity.MULTI)
          .classProto(EdgeMultiplicity)
          .overridable(true)
          .build(),
        Fb.create('created_at', T.MicrotimeType.create())
          .build(),
      ],
      [
        'gdbots:ncr:mixin:edge:v1',
        'gdbots:ncr:mixin:edge',
      ]
    );
  }
}

GdbotsNcrEdgeV1Mixin(SampleEdge);
MessageResolver.registerMessage('gdbots:tests.schemas.ncr:fixtures:sample-edge:v1', SampleEdge);
Object.freeze(SampleEdge);
Object.freeze(SampleEdge.prototype);
