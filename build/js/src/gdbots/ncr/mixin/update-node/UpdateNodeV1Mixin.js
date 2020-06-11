// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/update-node/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class UpdateNodeV1Mixin {
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
      Fb.create(this.NEW_NODE_FIELD, T.MessageType.create())
        .required()
        .anyOfCuries([
          'gdbots:ncr:mixin:node',
        ])
        .overridable(true)
        .build(),
      /*
       * The entire node, as it appeared before it was modified.
       */
      Fb.create(this.OLD_NODE_FIELD, T.MessageType.create())
        .anyOfCuries([
          'gdbots:ncr:mixin:node',
        ])
        .overridable(true)
        .build(),
      /*
       * The names of the fields this update command should apply changes to.
       * Nested paths can be referenced using dot notation.
       */
      Fb.create(this.PATHS_FIELD, T.StringType.create())
        .asASet()
        .pattern('^[a-zA-Z_]{1}[\\w\\.]*$')
        .build(),
    ];
  }
}

const M = UpdateNodeV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:update-node:1-0-1';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:update-node';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:update-node:v1';

M.NODE_REF_FIELD = 'node_ref';
M.NEW_NODE_FIELD = 'new_node';
M.OLD_NODE_FIELD = 'old_node';
M.PATHS_FIELD = 'paths';

M.FIELDS = [
  M.NODE_REF_FIELD,
  M.NEW_NODE_FIELD,
  M.OLD_NODE_FIELD,
  M.PATHS_FIELD,
];
