// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/update-node/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class UpdateNodeV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:update-node:1-0-0');
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
      Fb.create('new_node', T.MessageType.create())
        .required()
        .anyOfCuries([
          'gdbots:ncr:mixin:node',
        ])
        .overridable(true)
        .build(),
      /*
       * The entire node, as it appeared before it was modified.
       */
      Fb.create('old_node', T.MessageType.create())
        .anyOfCuries([
          'gdbots:ncr:mixin:node',
        ])
        .overridable(true)
        .build(),
    ];
  }
}
