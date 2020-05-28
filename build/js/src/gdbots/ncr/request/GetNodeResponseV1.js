// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-response/1-0-0.json#
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetNodeResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:request:get-node-response:1-0-0', GetNodeResponseV1,
      [],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsNcrGetNodeResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetNodeResponseV1);
MessageResolver.register('gdbots:ncr:request:get-node-response', GetNodeResponseV1);
Object.freeze(GetNodeResponseV1);
Object.freeze(GetNodeResponseV1.prototype);
