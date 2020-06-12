// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/get-all-apps-request/1-0-0.json#
import SchemaId from '@gdbots/pbj/SchemaId';

export default class GetAllAppsRequestV1Mixin {
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

const M = GetAllAppsRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:get-all-apps-request:1-0-0';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:get-all-apps-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:get-all-apps-request:v1';

M.FIELDS = [];
