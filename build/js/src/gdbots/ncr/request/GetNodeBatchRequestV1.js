// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-batch-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsNcrGetNodeBatchRequestV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/get-node-batch-request/GetNodeBatchRequestV1Mixin';
import GdbotsPbjxRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Mixin';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class GetNodeBatchRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:request:get-node-batch-request:1-0-0', GetNodeBatchRequestV1,
      [
        /*
         * Context is a map of data that helps the NCR decide where to read/write data from.
         * A common use case is multi-tenant applications.
         */
        Fb.create('context', T.StringType.create())
          .asAMap()
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
      ],
      [
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsNcrGetNodeBatchRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(GetNodeBatchRequestV1);
MessageResolver.register('gdbots:ncr:request:get-node-batch-request', GetNodeBatchRequestV1);
Object.freeze(GetNodeBatchRequestV1);
Object.freeze(GetNodeBatchRequestV1.prototype);
