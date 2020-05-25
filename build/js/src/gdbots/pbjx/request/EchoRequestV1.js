// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/request/echo-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class EchoRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:pbjx:request:echo-request:1-0-0', EchoRequestV1,
      [
        Fb.create('msg', T.StringType.create())
          .build(),
      ],
      [
        GdbotsPbjxRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(EchoRequestV1);
MessageResolver.register('gdbots:pbjx:request:echo-request', EchoRequestV1);
Object.freeze(EchoRequestV1);
Object.freeze(EchoRequestV1.prototype);
