// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/role/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import RoleId from '@gdbots/schemas/gdbots/iam/RoleId';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class RoleV1Mixin {
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
      Fb.create(this._ID_FIELD, T.IdentifierType.create())
        .required()
        .classProto(RoleId)
        .build(),
      /*
       * The "allowed" field is a set of actions that a user will be granted.
       * Although the string can be anything it is best practice to use the
       * curies of the pbjx commands and requests from your application.
       * E.g. "acme:blog:command:publish-article" or "acme:blog:command:*"
       */
      Fb.create(this.ALLOWED_FIELD, T.StringType.create())
        .asASet()
        .pattern('^[a-z0-9_\\*\\.:-]+$')
        .build(),
      /*
       * The "denied" field works just like the "allowed" field with the
       * exception that these rules take precedence and deny a user's
       * ability to perform the action.
       */
      Fb.create(this.DENIED_FIELD, T.StringType.create())
        .asASet()
        .pattern('^[a-z0-9_\\*\\.:-]+$')
        .build(),
    ];
  }
}

const M = RoleV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:role:1-0-0';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:role';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:role:v1';

M._ID_FIELD = '_id';
M.ALLOWED_FIELD = 'allowed';
M.DENIED_FIELD = 'denied';

M.FIELDS = [
  M._ID_FIELD,
  M.ALLOWED_FIELD,
  M.DENIED_FIELD,
];
