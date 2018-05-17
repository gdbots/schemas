// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/list-all-apps-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class ListAllAppsResponseV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:list-all-apps-response:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('apps', T.IdentifierType.create())
        .asASet()
        .classProto(NodeRef)
        .build(),
    ];
  }
}
