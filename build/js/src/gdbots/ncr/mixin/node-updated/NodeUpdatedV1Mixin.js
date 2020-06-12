// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-updated/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class NodeUpdatedV1Mixin {
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
      Fb.create(this.SLUG_FIELD, T.StringType.create())
        .format(Format.SLUG)
        .build(),
      Fb.create(this.NEW_ETAG_FIELD, T.StringType.create())
        .maxLength(100)
        .pattern('^[\\w\\.:-]+$')
        .build(),
      Fb.create(this.OLD_ETAG_FIELD, T.StringType.create())
        .maxLength(100)
        .pattern('^[\\w\\.:-]+$')
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
       * The names of the fields this update event should apply changes to.
       * Nested paths can be referenced using dot notation.
       */
      Fb.create(this.PATHS_FIELD, T.StringType.create())
        .asASet()
        .pattern('^[a-zA-Z_]{1}[\\w\\.]*$')
        .build(),
    ];
  }
}

const M = NodeUpdatedV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:node-updated:1-0-1';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:node-updated';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:node-updated:v1';

M.NODE_REF_FIELD = 'node_ref';
M.SLUG_FIELD = 'slug';
M.NEW_ETAG_FIELD = 'new_etag';
M.OLD_ETAG_FIELD = 'old_etag';
M.NEW_NODE_FIELD = 'new_node';
M.OLD_NODE_FIELD = 'old_node';
M.PATHS_FIELD = 'paths';

M.FIELDS = [
  M.NODE_REF_FIELD,
  M.SLUG_FIELD,
  M.NEW_ETAG_FIELD,
  M.OLD_ETAG_FIELD,
  M.NEW_NODE_FIELD,
  M.OLD_NODE_FIELD,
  M.PATHS_FIELD,
];
