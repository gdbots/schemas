// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-renamed/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class NodeRenamedV1Mixin {
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
      Fb.create(this.NODE_STATUS_FIELD, T.StringEnumType.create())
        .classProto(NodeStatus)
        .build(),
      Fb.create(this.NEW_SLUG_FIELD, T.StringType.create())
        .format(Format.SLUG)
        .build(),
      Fb.create(this.OLD_SLUG_FIELD, T.StringType.create())
        .format(Format.SLUG)
        .build(),
    ];
  }
}

const M = NodeRenamedV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:node-renamed:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:node-renamed';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:node-renamed:v1';

M.NODE_REF_FIELD = 'node_ref';
M.NODE_STATUS_FIELD = 'node_status';
M.NEW_SLUG_FIELD = 'new_slug';
M.OLD_SLUG_FIELD = 'old_slug';

M.FIELDS = [
  M.NODE_REF_FIELD,
  M.NODE_STATUS_FIELD,
  M.NEW_SLUG_FIELD,
  M.OLD_SLUG_FIELD,
];
