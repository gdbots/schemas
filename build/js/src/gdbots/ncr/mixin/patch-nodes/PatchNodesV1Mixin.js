// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/patch-nodes/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class PatchNodesV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:patch-nodes:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('node_refs', T.IdentifierType.create())
        .asASet()
        .classProto(NodeRef)
        .build(),
      /*
       * The names of the fields this patch command should apply changes to.
       * Nested paths can be referenced using dot notation.
       */
      Fb.create('paths', T.StringType.create())
        .asASet()
        .pattern('^[a-zA-Z_]{1}[\\w\\.]*$')
        .build(),
    ];
  }
}
