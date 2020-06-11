// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/publish-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class PublishNodeV1Mixin {
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
      Fb.create(this.PUBLISH_AT_FIELD, T.DateTimeType.create())
        .build(),
    ];
  }
}

const M = PublishNodeV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:publish-node:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:publish-node';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:publish-node:v1';

M.NODE_REF_FIELD = 'node_ref';
M.PUBLISH_AT_FIELD = 'publish_at';

M.FIELDS = [
  M.NODE_REF_FIELD,
  M.PUBLISH_AT_FIELD,
];
