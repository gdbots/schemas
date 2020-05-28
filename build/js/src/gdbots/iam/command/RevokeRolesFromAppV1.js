// @link http://schemas.gdbots.io/json-schema/gdbots/iam/command/revoke-roles-from-app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class RevokeRolesFromAppV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:command:revoke-roles-from-app:1-0-0', RevokeRolesFromAppV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        /*
         * The roles to revoke from the app.
         */
        Fb.create('roles', T.NodeRefType.create())
          .asASet()
          .build(),
      ],
      [
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(RevokeRolesFromAppV1);
MessageResolver.register('gdbots:iam:command:revoke-roles-from-app', RevokeRolesFromAppV1);
Object.freeze(RevokeRolesFromAppV1);
Object.freeze(RevokeRolesFromAppV1.prototype);
