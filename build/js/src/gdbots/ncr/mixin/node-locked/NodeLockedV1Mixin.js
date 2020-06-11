// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-locked/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class NodeLockedV1Mixin {
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

const M = NodeLockedV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:node-locked:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:node-locked';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:node-locked:v1';

M.NODE_REF_FIELD = 'node_ref';

M.FIELDS = [
  M.NODE_REF_FIELD,
];
