// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-batch-response/1-0-0.json#
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetNodeBatchResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:request:get-node-batch-response:1-0-0', GetNodeBatchResponseV1,
      [],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsNcrGetNodeBatchResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetNodeBatchResponseV1);
MessageResolver.register('gdbots:ncr:request:get-node-batch-response', GetNodeBatchResponseV1);
Object.freeze(GetNodeBatchResponseV1);
Object.freeze(GetNodeBatchResponseV1.prototype);
