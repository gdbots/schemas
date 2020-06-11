// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-patched/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class NodePatchedV1Mixin {
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
      /*
       * The names of the fields this patch event should apply changes to.
       * Nested paths can be referenced using dot notation.
       */
      Fb.create(this.PATHS_FIELD, T.StringType.create())
        .asASet()
        .pattern('^[a-zA-Z_]{1}[\\w\\.]*$')
        .build(),
    ];
  }
}

const M = NodePatchedV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:node-patched:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:node-patched';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:node-patched:v1';

M.NODE_REF_FIELD = 'node_ref';
M.PATHS_FIELD = 'paths';

M.FIELDS = [
  M.NODE_REF_FIELD,
  M.PATHS_FIELD,
];
