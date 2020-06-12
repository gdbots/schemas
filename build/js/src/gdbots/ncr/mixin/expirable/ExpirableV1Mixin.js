// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/expirable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class ExpirableV1Mixin {
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
      Fb.create(this.EXPIRES_AT_FIELD, T.DateTimeType.create())
        .build(),
    ];
  }
}

const M = ExpirableV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:expirable:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:expirable';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:expirable:v1';

M.EXPIRES_AT_FIELD = 'expires_at';

M.FIELDS = [
  M.EXPIRES_AT_FIELD,
];
