// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/slack-app/1-0-0.json#
import SchemaId from '@gdbots/pbj/SchemaId';

export default class SlackAppV1Mixin {
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

const M = SlackAppV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:slack-app:1-0-0';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:slack-app';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:slack-app:v1';

M.FIELDS = [];
