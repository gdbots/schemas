// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/search-events-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SearchEventsResponseV1Mixin {
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
      /*
       * The total number of events matching the search.
       */
      Fb.create(this.TOTAL_FIELD, T.IntType.create())
        .build(),
      Fb.create(this.HAS_MORE_FIELD, T.BooleanType.create())
        .build(),
      /*
       * How long in milliseconds it took to run the query.
       */
      Fb.create(this.TIME_TAKEN_FIELD, T.MediumIntType.create())
        .build(),
      /*
       * The maximum score of a matching event from the entire search.
       */
      Fb.create(this.MAX_SCORE_FIELD, T.FloatType.create())
        .build(),
      /*
       * Cursors are optionally provided by the underlying search system to allow for efficient
       * pagination. In the absense of cursors, paging is done using count and page number.
       */
      Fb.create(this.CURSORS_FIELD, T.StringType.create())
        .asAMap()
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

const M = SearchEventsResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:search-events-response:1-0-0';
M.SCHEMA_CURIE = 'gdbots:pbjx:mixin:search-events-response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:search-events-response:v1';

M.TOTAL_FIELD = 'total';
M.HAS_MORE_FIELD = 'has_more';
M.TIME_TAKEN_FIELD = 'time_taken';
M.MAX_SCORE_FIELD = 'max_score';
M.CURSORS_FIELD = 'cursors';
M.EVENTS_FIELD = 'events';

M.FIELDS = [
  M.TOTAL_FIELD,
  M.HAS_MORE_FIELD,
  M.TIME_TAKEN_FIELD,
  M.MAX_SCORE_FIELD,
  M.CURSORS_FIELD,
  M.EVENTS_FIELD,
];
