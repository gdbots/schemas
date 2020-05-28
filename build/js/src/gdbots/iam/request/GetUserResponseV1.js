// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/get-user-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class GetUserResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:request:get-user-response:1-0-0', GetUserResponseV1,
      [
        Fb.create('node', T.MessageType.create())
          .anyOfCuries([
            'gdbots:iam:mixin:user',
          ])
          .build(),
      ],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsNcrGetNodeResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetUserResponseV1);
MessageResolver.register('gdbots:iam:request:get-user-response', GetUserResponseV1);
Object.freeze(GetUserResponseV1);
Object.freeze(GetUserResponseV1.prototype);
