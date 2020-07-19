import GdbotsNcrEdgeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/edge/EdgeV1Mixin';
import EdgeMultiplicity from '@gdbots/schemas/gdbots/ncr/enums/EdgeMultiplicity';
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

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
