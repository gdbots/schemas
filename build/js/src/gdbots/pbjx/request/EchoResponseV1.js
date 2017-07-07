// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/request/echo-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Mixin';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class EchoResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:pbjx:request:echo-response:1-0-0', EchoResponseV1,
      [
        Fb.create('msg', T.StringType.create())
          .build(),
      ],
      [
        GdbotsPbjxResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(EchoResponseV1);
MessageResolver.register('gdbots:pbjx:request:echo-response', EchoResponseV1);
Object.freeze(EchoResponseV1);
Object.freeze(EchoResponseV1.prototype);
