// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-batch-request/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetNodeBatchRequestV1Mixin {
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
      /*
       * If true, a strongly consistent read is used; if false (the default), an eventually consistent read is used.
       */
      Fb.create(this.CONSISTENT_READ_FIELD, T.BooleanType.create())
        .build(),
      Fb.create(this.NODE_REFS_FIELD, T.NodeRefType.create())
        .asASet()
        .build(),
    ];
  }
}

const M = GetNodeBatchRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:get-node-batch-request:1-0-2';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:get-node-batch-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:get-node-batch-request:v1';

M.CONSISTENT_READ_FIELD = 'consistent_read';
M.NODE_REFS_FIELD = 'node_refs';

M.FIELDS = [
  M.CONSISTENT_READ_FIELD,
  M.NODE_REFS_FIELD,
];
