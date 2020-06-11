// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/search-events-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import SearchEventsSort from '@gdbots/schemas/gdbots/pbjx/enums/SearchEventsSort';
import T from '@gdbots/pbj/types';

export default class SearchEventsRequestV1Mixin {
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
      Fb.create(this.Q_FIELD, T.TextType.create())
        .maxLength(2000)
        .build(),
      /*
       * The number of results to return.
       */
      Fb.create(this.COUNT_FIELD, T.TinyIntType.create())
        .withDefault(25)
        .build(),
      Fb.create(this.PAGE_FIELD, T.TinyIntType.create())
        .min(1)
        .withDefault(1)
        .build(),
      /*
       * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
       * When cursor is present it should be used instead of "page".
       */
      Fb.create(this.CURSOR_FIELD, T.StringType.create())
        .build(),
      Fb.create(this.SORT_FIELD, T.StringEnumType.create())
        .withDefault(SearchEventsSort.RELEVANCE)
        .classProto(SearchEventsSort)
        .build(),
      Fb.create(this.OCCURRED_AFTER_FIELD, T.DateTimeType.create())
        .build(),
      Fb.create(this.OCCURRED_BEFORE_FIELD, T.DateTimeType.create())
        .build(),
      /*
       * The fields that are being queried as determined by parsing the "q" field.
       */
      Fb.create(this.FIELDS_USED_FIELD, T.StringType.create())
        .asASet()
        .pattern('^[\\w\\.-]+$')
        .build(),
      Fb.create(this.PARSED_QUERY_JSON_FIELD, T.TextType.create())
        .build(),
    ];
  }
}

const M = SearchEventsRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:search-events-request:1-0-0';
M.SCHEMA_CURIE = 'gdbots:pbjx:mixin:search-events-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:search-events-request:v1';

M.Q_FIELD = 'q';
M.COUNT_FIELD = 'count';
M.PAGE_FIELD = 'page';
M.CURSOR_FIELD = 'cursor';
M.SORT_FIELD = 'sort';
M.OCCURRED_AFTER_FIELD = 'occurred_after';
M.OCCURRED_BEFORE_FIELD = 'occurred_before';
M.FIELDS_USED_FIELD = 'fields_used';
M.PARSED_QUERY_JSON_FIELD = 'parsed_query_json';

M.FIELDS = [
  M.Q_FIELD,
  M.COUNT_FIELD,
  M.PAGE_FIELD,
  M.CURSOR_FIELD,
  M.SORT_FIELD,
  M.OCCURRED_AFTER_FIELD,
  M.OCCURRED_BEFORE_FIELD,
  M.FIELDS_USED_FIELD,
  M.PARSED_QUERY_JSON_FIELD,
];
