// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/request/get-node-history-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class GetNodeHistoryResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:ncr:request:get-node-history-response:1-0-0', GetNodeHistoryResponseV1,
      [
        Fb.create('has_more', T.BooleanType.create())
          .build(),
        /*
         * The last "occurred_at" value from the last event in the "events" list. This can be
         * used as "since" when requesting the next set of events if "has_more" is true.
         */
        Fb.create('last_occurred_at', T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
        Fb.create('events', T.MessageType.create())
          .asAList()
          .anyOfCuries([
            'gdbots:pbjx:mixin:event',
          ])
          .build(),
      ],
      [
        GdbotsPbjxResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetNodeHistoryResponseV1);
MessageResolver.register('gdbots:ncr:request:get-node-history-response', GetNodeHistoryResponseV1);
Object.freeze(GetNodeHistoryResponseV1);
Object.freeze(GetNodeHistoryResponseV1.prototype);
