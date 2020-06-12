// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/publishable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class PublishableV1Mixin {
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
      Fb.create(this.PUBLISHED_AT_FIELD, T.DateTimeType.create())
        .build(),
    ];
  }
}

const M = PublishableV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:publishable:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:publishable';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:publishable:v1';

M.PUBLISHED_AT_FIELD = 'published_at';

M.FIELDS = [
  M.PUBLISHED_AT_FIELD,
];
