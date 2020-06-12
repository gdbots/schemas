// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/edge/1-0-0.json#
import EdgeMultiplicity from '@gdbots/schemas/gdbots/ncr/enums/EdgeMultiplicity';
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class EdgeV1Mixin {
  /**
   * @returns {SchemaId}
   */
  static getId() {
    return SchemaId.fromString(this.SCHEMA_ID);
  }

  /**
   * @param {string} name
   * @returns {boolean}
   */
  static hasField(name) {
    return this.FIELDS.includes(name);
  }

  /**
   * @returns {Field[]}
   */
  static getFields() {
    return [
      Fb.create(this.FROM_REF_FIELD, T.NodeRefType.create())
        .required()
        .build(),
      Fb.create(this.TO_REF_FIELD, T.NodeRefType.create())
        .required()
        .build(),
      Fb.create(this.MULTIPLICITY_FIELD, T.StringEnumType.create())
        .withDefault(EdgeMultiplicity.MULTI)
        .classProto(EdgeMultiplicity)
        .overridable(true)
        .build(),
      Fb.create(this.CREATED_AT_FIELD, T.MicrotimeType.create())
        .build(),
    ];
  }
}

const M = EdgeV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:edge:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:edge';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:edge:v1';

M.FROM_REF_FIELD = 'from_ref';
M.TO_REF_FIELD = 'to_ref';
M.MULTIPLICITY_FIELD = 'multiplicity';
M.CREATED_AT_FIELD = 'created_at';

M.FIELDS = [
  M.FROM_REF_FIELD,
  M.TO_REF_FIELD,
  M.MULTIPLICITY_FIELD,
  M.CREATED_AT_FIELD,
];
