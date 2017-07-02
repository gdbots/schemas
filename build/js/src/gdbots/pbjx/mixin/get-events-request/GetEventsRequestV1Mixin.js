// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/get-events-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import StreamId from '@gdbots/schemas/gdbots/pbjx/StreamId';
import T from '@gdbots/pbj/types';

export default class GetEventsRequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:pbjx:mixin:get-events-request:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('stream_id', T.IdentifierType.create())
        .required()
        .classProto(StreamId)
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
    ];
  }
}
