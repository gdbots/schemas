// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/search-nodes-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SearchNodesResponseV1Mixin {
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
       * The total number of nodes matching the search.
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
       * The maximum score of a matching node from the entire search.
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
      Fb.create(this.NODES_FIELD, T.MessageType.create())
        .asAList()
        .anyOfCuries([
          'gdbots:ncr:mixin:node',
        ])
        .overridable(true)
        .build(),
    ];
  }
}

const M = SearchNodesResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:search-nodes-response:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:search-nodes-response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:search-nodes-response:v1';

M.TOTAL_FIELD = 'total';
M.HAS_MORE_FIELD = 'has_more';
M.TIME_TAKEN_FIELD = 'time_taken';
M.MAX_SCORE_FIELD = 'max_score';
M.CURSORS_FIELD = 'cursors';
M.NODES_FIELD = 'nodes';

M.FIELDS = [
  M.TOTAL_FIELD,
  M.HAS_MORE_FIELD,
  M.TIME_TAKEN_FIELD,
  M.MAX_SCORE_FIELD,
  M.CURSORS_FIELD,
  M.NODES_FIELD,
];
