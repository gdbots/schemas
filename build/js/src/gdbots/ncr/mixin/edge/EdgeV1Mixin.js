// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/edge/1-0-0.json#
import EdgeMultiplicity from '@gdbots/schemas/gdbots/ncr/enums/EdgeMultiplicity';
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class EdgeV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:edge:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
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
    ];
  }
}
