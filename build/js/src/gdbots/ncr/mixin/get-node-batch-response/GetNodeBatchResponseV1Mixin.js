// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-batch-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetNodeBatchResponseV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:get-node-batch-response:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('nodes', T.MessageType.create())
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
      Fb.create('missing_node_refs', T.NodeRefType.create())
        .asASet()
        .build(),
    ];
  }
}
