// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/mixin/tracker/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class TrackerV1Mixin {
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
      Fb.create(this.IS_ENABLED_FIELD, T.BooleanType.create())
        .build(),
    ];
  }
}

const M = TrackerV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:analytics:mixin:tracker:1-0-0';
M.SCHEMA_CURIE = 'gdbots:analytics:mixin:tracker';
M.SCHEMA_CURIE_MAJOR = 'gdbots:analytics:mixin:tracker:v1';

M.IS_ENABLED_FIELD = 'is_enabled';

M.FIELDS = [
  M.IS_ENABLED_FIELD,
];
