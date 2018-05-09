// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-patched/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class NodePatchedV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:node-patched:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('node_ref', T.IdentifierType.create())
        .required()
        .classProto(NodeRef)
        .build(),
      /*
       * The names of the fields this patch event should apply changes to. Sub paths can be pointed to
       * using dot notation.
       */
      Fb.create('paths', T.StringType.create())
        .asASet()
        .pattern('^[a-zA-Z_]{1}[a-zA-Z0-9_\\.]*$')
        .build(),
    ];
  }
}
