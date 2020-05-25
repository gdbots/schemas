// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:app:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * The roles determine what permissions this app will have when using the system.
       * The role itself is a node which has a set of "allow" and "deny" rules.
       */
      Fb.create('roles', T.NodeRefType.create())
        .asASet()
        .build(),
    ];
  }
}
