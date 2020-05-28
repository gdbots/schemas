// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-request/1-0-0.json#
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetNodeRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:request:get-node-request:1-0-0', GetNodeRequestV1,
      [],
      [
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsNcrGetNodeRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(GetNodeRequestV1);
MessageResolver.register('gdbots:ncr:request:get-node-request', GetNodeRequestV1);
Object.freeze(GetNodeRequestV1);
Object.freeze(GetNodeRequestV1.prototype);
