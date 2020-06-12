// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-batch-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetNodeBatchResponseV1Mixin {
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
      Fb.create(this.NODES_FIELD, T.MessageType.create())
        .asAMap()
        .anyOfCuries([
          'gdbots:ncr:mixin:node',
        ])
        .overridable(true)
        .build(),
      /*
       * The "missing_node_refs" field contains a set of node_refs that
       * the batch request failed to retrieve.
       */
      Fb.create(this.MISSING_NODE_REFS_FIELD, T.NodeRefType.create())
        .asASet()
        .build(),
    ];
  }
}

const M = GetNodeBatchResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:get-node-batch-response:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:get-node-batch-response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:get-node-batch-response:v1';

M.NODES_FIELD = 'nodes';
M.MISSING_NODE_REFS_FIELD = 'missing_node_refs';

M.FIELDS = [
  M.NODES_FIELD,
  M.MISSING_NODE_REFS_FIELD,
];
