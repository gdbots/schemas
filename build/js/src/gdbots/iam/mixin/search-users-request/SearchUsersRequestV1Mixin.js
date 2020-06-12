// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/search-users-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import SearchUsersSort from '@gdbots/schemas/gdbots/iam/enums/SearchUsersSort';
import T from '@gdbots/pbj/types';

export default class SearchUsersRequestV1Mixin {
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
        .withDefault(SearchUsersSort.RELEVANCE)
        .classProto(SearchUsersSort)
        .build(),
      Fb.create(this.IS_STAFF_FIELD, T.TrinaryType.create())
        .build(),
      Fb.create(this.IS_BLOCKED_FIELD, T.TrinaryType.create())
        .withDefault(2)
        .build(),
    ];
  }
}

const M = SearchUsersRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:search-users-request:1-0-0';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:search-users-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:search-users-request:v1';

M.SORT_FIELD = 'sort';
M.IS_STAFF_FIELD = 'is_staff';
M.IS_BLOCKED_FIELD = 'is_blocked';

M.FIELDS = [
  M.SORT_FIELD,
  M.IS_STAFF_FIELD,
  M.IS_BLOCKED_FIELD,
];
