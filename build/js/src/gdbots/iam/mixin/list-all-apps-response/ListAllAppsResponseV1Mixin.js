// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/list-all-apps-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
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
      Fb.create('nodes', T.MessageType.create())
        .asAList()
        .anyOfCuries([
          'gdbots:iam:mixin:app',
        ])
        .build(),
    ];
  }
}
