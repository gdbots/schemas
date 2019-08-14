// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-batch-request/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetNodeBatchRequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:get-node-batch-request:1-0-1');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * If true, a strongly consistent read is used; if false (the default), an eventually consistent read is used.
       */
      Fb.create('consistent_read', T.BooleanType.create())
        .build(),
      Fb.create('node_refs', T.IdentifierType.create())
        .asASet()
        .classProto(NodeRef)
        .build(),
      /*
       * Field names to dereference, this serves as a hint to the server and is not
       * necessarily gauranteed since authorization, availability, etc. are determined
       * by the server not the client.
       */
      Fb.create('derefs', T.StringType.create())
        .asASet()
        .pattern('^[\\w\\.-]+$')
        .build(),
    ];
  }
}
