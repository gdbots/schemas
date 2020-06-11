// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/app-roles-revoked/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AppRolesRevokedV1Mixin {
  /**
   * @returns {SchemaId}
   */
  static getId() {
    return SchemaId.fromString(this.SCHEMA_ID);
  }

  /**
   * @param {string} name
   * @returns {boolean}
   */
  static hasField(name) {
    return this.FIELDS.includes(name);
  }

  /**
   * @returns {Field[]}
   */
  static getFields() {
    return [
      Fb.create(this.NODE_REF_FIELD, T.NodeRefType.create())
        .required()
        .build(),
      /*
       * The roles revoked from the app.
       */
      Fb.create(this.ROLES_FIELD, T.NodeRefType.create())
        .asASet()
        .build(),
    ];
  }
}

const M = AppRolesRevokedV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:app-roles-revoked:1-0-0';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:app-roles-revoked';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:app-roles-revoked:v1';

M.NODE_REF_FIELD = 'node_ref';
M.ROLES_FIELD = 'roles';

M.FIELDS = [
  M.NODE_REF_FIELD,
  M.ROLES_FIELD,
];
