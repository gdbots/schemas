// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/search-nodes-request/1-0-3.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SearchNodesRequestV1Mixin {
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
      Fb.create(this.AUTOCOMPLETE_FIELD, T.BooleanType.create())
        .build(),
      /*
       * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
       * When cursor is present it should be used instead of "page".
       */
      Fb.create(this.CURSOR_FIELD, T.StringType.create())
        .build(),
      /*
       * The status a node must be in to match the search request.
       */
      Fb.create(this.STATUS_FIELD, T.StringEnumType.create())
        .classProto(NodeStatus)
        .build(),
      /*
       * A set of statuses (node must match at least one) to include in the search results.
       */
      Fb.create(this.STATUSES_FIELD, T.StringEnumType.create())
        .asASet()
        .classProto(NodeStatus)
        .build(),
      Fb.create(this.CREATED_AFTER_FIELD, T.DateTimeType.create())
        .build(),
      Fb.create(this.CREATED_BEFORE_FIELD, T.DateTimeType.create())
        .build(),
      Fb.create(this.UPDATED_AFTER_FIELD, T.DateTimeType.create())
        .build(),
      Fb.create(this.UPDATED_BEFORE_FIELD, T.DateTimeType.create())
        .build(),
      Fb.create(this.PUBLISHED_AFTER_FIELD, T.DateTimeType.create())
        .build(),
      Fb.create(this.PUBLISHED_BEFORE_FIELD, T.DateTimeType.create())
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

const M = SearchNodesRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:search-nodes-request:1-0-3';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:search-nodes-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:search-nodes-request:v1';

M.Q_FIELD = 'q';
M.COUNT_FIELD = 'count';
M.PAGE_FIELD = 'page';
M.AUTOCOMPLETE_FIELD = 'autocomplete';
M.CURSOR_FIELD = 'cursor';
M.STATUS_FIELD = 'status';
M.STATUSES_FIELD = 'statuses';
M.CREATED_AFTER_FIELD = 'created_after';
M.CREATED_BEFORE_FIELD = 'created_before';
M.UPDATED_AFTER_FIELD = 'updated_after';
M.UPDATED_BEFORE_FIELD = 'updated_before';
M.PUBLISHED_AFTER_FIELD = 'published_after';
M.PUBLISHED_BEFORE_FIELD = 'published_before';
M.FIELDS_USED_FIELD = 'fields_used';
M.PARSED_QUERY_JSON_FIELD = 'parsed_query_json';

M.FIELDS = [
  M.Q_FIELD,
  M.COUNT_FIELD,
  M.PAGE_FIELD,
  M.AUTOCOMPLETE_FIELD,
  M.CURSOR_FIELD,
  M.STATUS_FIELD,
  M.STATUSES_FIELD,
  M.CREATED_AFTER_FIELD,
  M.CREATED_BEFORE_FIELD,
  M.UPDATED_AFTER_FIELD,
  M.UPDATED_BEFORE_FIELD,
  M.PUBLISHED_AFTER_FIELD,
  M.PUBLISHED_BEFORE_FIELD,
  M.FIELDS_USED_FIELD,
  M.PARSED_QUERY_JSON_FIELD,
];
