// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/get-events-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import StreamId from '@gdbots/schemas/gdbots/pbjx/StreamId';
import T from '@gdbots/pbj/types';

export default class GetEventsRequestV1Mixin {
  /**
   * @returns {SchemaId}
   */
  static getId() {
    return SchemaId.fromString(this.SCHEMA_ID);
  }

  /**
   * @param {string} name
   * @returns {boolean}
   */
  static hasField(name) {
    return this.FIELDS.includes(name);
  }

  /**
   * @returns {Field[]}
   */
  static getFields() {
    return [
      Fb.create(this.STREAM_ID_FIELD, T.IdentifierType.create())
        .required()
        .classProto(StreamId)
        .build(),
      /*
       * Return events since this time (exclusive greater than if forward=true, less than if forward=false)
       */
      Fb.create(this.SINCE_FIELD, T.MicrotimeType.create())
        .useTypeDefault(false)
        .build(),
      /*
       * The number of events to return.
       */
      Fb.create(this.COUNT_FIELD, T.TinyIntType.create())
        .withDefault(25)
        .build(),
      /*
       * When true, the events are read from oldest to newest, otherwise newest to oldest.
       */
      Fb.create(this.FORWARD_FIELD, T.BooleanType.create())
        .build(),
    ];
  }
}

const M = GetEventsRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:get-events-request:1-0-0';
M.SCHEMA_CURIE = 'gdbots:pbjx:mixin:get-events-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:get-events-request:v1';

M.STREAM_ID_FIELD = 'stream_id';
M.SINCE_FIELD = 'since';
M.COUNT_FIELD = 'count';
M.FORWARD_FIELD = 'forward';

M.FIELDS = [
  M.STREAM_ID_FIELD,
  M.SINCE_FIELD,
  M.COUNT_FIELD,
  M.FORWARD_FIELD,
];
