// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/user/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class UserV1Mixin {
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
      Fb.create(this.FIRST_NAME_FIELD, T.StringType.create())
        .build(),
      Fb.create(this.LAST_NAME_FIELD, T.StringType.create())
        .build(),
      Fb.create(this.EMAIL_FIELD, T.StringType.create())
        .format(Format.EMAIL)
        .build(),
      Fb.create(this.EMAIL_DOMAIN_FIELD, T.StringType.create())
        .format(Format.HOSTNAME)
        .build(),
      /*
       * A general format for international telephone numbers.
       * @link https://en.wikipedia.org/wiki/E.164
       */
      Fb.create(this.PHONE_FIELD, T.StringType.create())
        .asAMap()
        .pattern('^\\+?[1-9]\\d{1,14}$')
        .build(),
      /*
       * Networks is a map that contains handles/usernames on a social network.
       * E.g. facebook:homer, twitter:stackoverflow, youtube:coltrane78.
       */
      Fb.create(this.NETWORKS_FIELD, T.StringType.create())
        .asAMap()
        .maxLength(50)
        .pattern('^[\\w\\.-]+$')
        .build(),
      Fb.create(this.IS_BLOCKED_FIELD, T.BooleanType.create())
        .build(),
      /*
       * Indicates that the user is a staff member and has access to the cms, dashboard, etc.
       */
      Fb.create(this.IS_STAFF_FIELD, T.BooleanType.create())
        .build(),
      /*
       * A user's roles determine what permissions they'll have when using the system.
       * The role itself is a node which has a set of "allow" and "deny" rules.
       */
      Fb.create(this.ROLES_FIELD, T.NodeRefType.create())
        .asASet()
        .build(),
    ];
  }
}

const M = UserV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:user:1-0-1';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:user';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:user:v1';

M.FIRST_NAME_FIELD = 'first_name';
M.LAST_NAME_FIELD = 'last_name';
M.EMAIL_FIELD = 'email';
M.EMAIL_DOMAIN_FIELD = 'email_domain';
M.PHONE_FIELD = 'phone';
M.NETWORKS_FIELD = 'networks';
M.IS_BLOCKED_FIELD = 'is_blocked';
M.IS_STAFF_FIELD = 'is_staff';
M.ROLES_FIELD = 'roles';

M.FIELDS = [
  M.FIRST_NAME_FIELD,
  M.LAST_NAME_FIELD,
  M.EMAIL_FIELD,
  M.EMAIL_DOMAIN_FIELD,
  M.PHONE_FIELD,
  M.NETWORKS_FIELD,
  M.IS_BLOCKED_FIELD,
  M.IS_STAFF_FIELD,
  M.ROLES_FIELD,
];
