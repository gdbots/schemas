// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-created/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class NodeCreatedV1Mixin {
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
      Fb.create(this.NODE_FIELD, T.MessageType.create())
        .required()
        .anyOfCuries([
          'gdbots:ncr:mixin:node',
        ])
        .overridable(true)
        .build(),
    ];
  }
}

const M = NodeCreatedV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:node-created:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:node-created';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:node-created:v1';

M.NODE_FIELD = 'node';

M.FIELDS = [
  M.NODE_FIELD,
];
