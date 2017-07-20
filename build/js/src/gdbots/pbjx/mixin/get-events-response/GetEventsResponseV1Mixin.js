// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/get-events-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetEventsResponseV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:pbjx:mixin:get-events-response:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
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
        .overridable(true)
        .build(),
    ];
  }
}
