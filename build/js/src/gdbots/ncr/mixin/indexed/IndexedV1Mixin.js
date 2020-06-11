// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/indexed/1-0-0.json#
import SchemaId from '@gdbots/pbj/SchemaId';

export default class IndexedV1Mixin {
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

const M = IndexedV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:indexed:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:indexed';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:indexed:v1';

M.FIELDS = [];
