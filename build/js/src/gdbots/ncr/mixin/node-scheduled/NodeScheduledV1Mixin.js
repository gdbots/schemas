// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-scheduled/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class NodeScheduledV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:node-scheduled:1-0-0');
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
      Fb.create('slug', T.StringType.create())
        .format(Format.SLUG)
        .build(),
      Fb.create('publish_at', T.DateTimeType.create())
        .build(),
    ];
  }
}
