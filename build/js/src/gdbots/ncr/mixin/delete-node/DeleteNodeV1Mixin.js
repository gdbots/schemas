// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/delete-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class DeleteNodeV1Mixin {
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
      Fb.create(this.NODE_REF_FIELD, T.NodeRefType.create())
        .required()
        .build(),
    ];
  }
}

const M = DeleteNodeV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:delete-node:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:delete-node';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:delete-node:v1';

M.NODE_REF_FIELD = 'node_ref';

M.FIELDS = [
  M.NODE_REF_FIELD,
];
