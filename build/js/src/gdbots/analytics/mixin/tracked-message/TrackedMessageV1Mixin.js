// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/mixin/tracked-message/1-0-0.json#
import SchemaId from '@gdbots/pbj/SchemaId';

export default class TrackedMessageV1Mixin {
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
    return [];
  }
}

const M = TrackedMessageV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:analytics:mixin:tracked-message:1-0-0';
M.SCHEMA_CURIE = 'gdbots:analytics:mixin:tracked-message';
M.SCHEMA_CURIE_MAJOR = 'gdbots:analytics:mixin:tracked-message:v1';

M.FIELDS = [];
