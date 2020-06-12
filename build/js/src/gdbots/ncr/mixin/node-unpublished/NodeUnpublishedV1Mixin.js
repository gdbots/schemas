// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-unpublished/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class NodeUnpublishedV1Mixin {
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
    ];
  }
}

const M = NodeUnpublishedV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:node-unpublished:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:node-unpublished';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:node-unpublished:v1';

M.NODE_REF_FIELD = 'node_ref';
M.SLUG_FIELD = 'slug';

M.FIELDS = [
  M.NODE_REF_FIELD,
  M.SLUG_FIELD,
];
