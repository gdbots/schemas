// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/get-user-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class GetUserRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:request:get-user-request:1-0-0', GetUserRequestV1,
      [
        Fb.create('email', T.StringType.create())
          .format(Format.EMAIL)
          .build(),
      ],
      [
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsNcrGetNodeRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(GetUserRequestV1);
MessageResolver.register('gdbots:iam:request:get-user-request', GetUserRequestV1);
Object.freeze(GetUserRequestV1);
Object.freeze(GetUserRequestV1.prototype);
