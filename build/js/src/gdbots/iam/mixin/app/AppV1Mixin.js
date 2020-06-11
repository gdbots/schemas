// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AppV1Mixin {
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
      /*
       * The roles determine what permissions this app will have when using the system.
       * The role itself is a node which has a set of "allow" and "deny" rules.
       */
      Fb.create(this.ROLES_FIELD, T.NodeRefType.create())
        .asASet()
        .build(),
    ];
  }
}

const M = AppV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:app:1-0-0';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:app';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:app:v1';

M.ROLES_FIELD = 'roles';

M.FIELDS = [
  M.ROLES_FIELD,
];
