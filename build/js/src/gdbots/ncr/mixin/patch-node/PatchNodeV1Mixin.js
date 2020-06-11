// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/patch-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class PatchNodeV1Mixin {
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

const M = PatchNodeV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:patch-node:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:patch-node';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:patch-node:v1';

M.NODE_REF_FIELD = 'node_ref';
M.PATHS_FIELD = 'paths';

M.FIELDS = [
  M.NODE_REF_FIELD,
  M.PATHS_FIELD,
];
