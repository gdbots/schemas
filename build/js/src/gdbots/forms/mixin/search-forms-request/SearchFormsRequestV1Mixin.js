// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-forms-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import SearchFormsSort from '@gdbots/schemas/gdbots/forms/enums/SearchFormsSort';
import T from '@gdbots/pbj/types';

export default class SearchFormsRequestV1Mixin {
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
      Fb.create(this.SORT_FIELD, T.StringEnumType.create())
        .withDefault(SearchFormsSort.RELEVANCE)
        .classProto(SearchFormsSort)
        .build(),
    ];
  }
}

const M = SearchFormsRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:forms:mixin:search-forms-request:1-0-0';
M.SCHEMA_CURIE = 'gdbots:forms:mixin:search-forms-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:search-forms-request:v1';

M.SORT_FIELD = 'sort';

M.FIELDS = [
  M.SORT_FIELD,
];
