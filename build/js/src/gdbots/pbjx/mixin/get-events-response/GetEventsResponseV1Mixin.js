// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/get-events-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetEventsResponseV1Mixin {
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
      Fb.create(this.HAS_MORE_FIELD, T.BooleanType.create())
        .build(),
      /*
       * The last "occurred_at" value from the last event in the "events" list. This can be
       * used as "since" when requesting the next set of events if "has_more" is true.
       */
      Fb.create(this.LAST_OCCURRED_AT_FIELD, T.MicrotimeType.create())
        .useTypeDefault(false)
        .build(),
      Fb.create(this.EVENTS_FIELD, T.MessageType.create())
        .asAList()
        .anyOfCuries([
          'gdbots:pbjx:mixin:event',
        ])
        .overridable(true)
        .build(),
    ];
  }
}

const M = GetEventsResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:get-events-response:1-0-0';
M.SCHEMA_CURIE = 'gdbots:pbjx:mixin:get-events-response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:get-events-response:v1';

M.HAS_MORE_FIELD = 'has_more';
M.LAST_OCCURRED_AT_FIELD = 'last_occurred_at';
M.EVENTS_FIELD = 'events';

M.FIELDS = [
  M.HAS_MORE_FIELD,
  M.LAST_OCCURRED_AT_FIELD,
  M.EVENTS_FIELD,
];
