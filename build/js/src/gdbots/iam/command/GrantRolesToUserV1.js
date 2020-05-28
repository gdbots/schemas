// @link http://schemas.gdbots.io/json-schema/gdbots/iam/command/grant-roles-to-user/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class GrantRolesToUserV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:command:grant-roles-to-user:1-0-0', GrantRolesToUserV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        /*
         * The roles to grant to the user.
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

GdbotsPbjxCommandV1Trait(GrantRolesToUserV1);
MessageResolver.register('gdbots:iam:command:grant-roles-to-user', GrantRolesToUserV1);
Object.freeze(GrantRolesToUserV1);
Object.freeze(GrantRolesToUserV1.prototype);
