// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/event/event-execution-failed/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import GdbotsPbjxIndexedV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/indexed/IndexedV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class EventExecutionFailedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:pbjx:event:event-execution-failed:1-0-1', EventExecutionFailedV1,
      [
        Fb.create('event', T.MessageType.create())
          .anyOfCuries([
            'gdbots:pbjx:mixin:event',
          ])
          .build(),
        Fb.create('error_code', T.SmallIntType.create())
          .withDefault(2)
          .build(),
        Fb.create('error_name', T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create('error_message', T.TextType.create())
          .build(),
        Fb.create('prev_error_message', T.TextType.create())
          .build(),
        Fb.create('stack_trace', T.TextType.create())
          .build(),
      ],
      [
        GdbotsPbjxEventV1Mixin.create(),
        GdbotsPbjxIndexedV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(EventExecutionFailedV1);
MessageResolver.register('gdbots:pbjx:event:event-execution-failed', EventExecutionFailedV1);
Object.freeze(EventExecutionFailedV1);
Object.freeze(EventExecutionFailedV1.prototype);
