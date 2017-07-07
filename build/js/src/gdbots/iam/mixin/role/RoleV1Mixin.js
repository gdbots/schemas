// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/role/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import RoleId from '@gdbots/schemas/gdbots/iam/RoleId';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class RoleV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:role:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('_id', T.IdentifierType.create())
        .required()
        .classProto(RoleId)
        .build(),
      /*
       * The "allowed" field is a set of actions that a user will be granted.
       * Although the string can be anything it is best practice to use the
       * curies of the pbjx commands and requests from your application.
       * E.g. "acme:blog:command:publish-article" or "acme:blog:command:*"
       */
      Fb.create('allowed', T.StringType.create())
        .asASet()
        .pattern('^[a-z0-9_\\*\\.:-]+$')
        .build(),
      /*
       * The "denied" field works just like the "allowed" field with the
       * exception that these rules take precedence and deny a user's
       * ability to perform the action.
       */
      Fb.create('denied', T.StringType.create())
        .asASet()
        .pattern('^[a-z0-9_\\*\\.:-]+$')
        .build(),
    ];
  }
}
