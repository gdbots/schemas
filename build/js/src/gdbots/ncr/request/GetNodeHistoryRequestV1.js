// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-history-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class GetNodeHistoryRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:request:get-node-history-request:1-0-0', GetNodeHistoryRequestV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        /*
         * Return events since this time (exclusive greater than if forward=true, less than if forward=false)
         */
        Fb.create('since', T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
        /*
         * The number of events to return.
         */
        Fb.create('count', T.TinyIntType.create())
          .withDefault(25)
          .build(),
        /*
         * When true, the events are read from oldest to newest, otherwise newest to oldest.
         */
        Fb.create('forward', T.BooleanType.create())
          .build(),
      ],
      [
        GdbotsPbjxRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(GetNodeHistoryRequestV1);
MessageResolver.register('gdbots:ncr:request:get-node-history-request', GetNodeHistoryRequestV1);
Object.freeze(GetNodeHistoryRequestV1);
Object.freeze(GetNodeHistoryRequestV1.prototype);
