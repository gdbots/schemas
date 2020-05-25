// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/revoke-roles-from-app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class RevokeRolesFromAppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:revoke-roles-from-app:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('node_ref', T.NodeRefType.create())
        .required()
        .build(),
      /*
       * The roles to revoke from the app.
       */
      Fb.create('roles', T.NodeRefType.create())
        .asASet()
        .build(),
    ];
  }
}
