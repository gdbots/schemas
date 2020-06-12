// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/patch-nodes/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class PatchNodesV1Mixin {
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
      Fb.create(this.NODE_REFS_FIELD, T.NodeRefType.create())
        .asASet()
        .build(),
      /*
       * The names of the fields this patch command should apply changes to.
       * Nested paths can be referenced using dot notation.
       */
      Fb.create(this.PATHS_FIELD, T.StringType.create())
        .asASet()
        .pattern('^[a-zA-Z_]{1}[\\w\\.]*$')
        .build(),
    ];
  }
}

const M = PatchNodesV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:patch-nodes:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:patch-nodes';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:patch-nodes:v1';

M.NODE_REFS_FIELD = 'node_refs';
M.PATHS_FIELD = 'paths';

M.FIELDS = [
  M.NODE_REFS_FIELD,
  M.PATHS_FIELD,
];
