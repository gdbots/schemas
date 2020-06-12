// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetNodeResponseV1Mixin {
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
        .anyOfCuries([
          'gdbots:ncr:mixin:node',
        ])
        .overridable(true)
        .build(),
    ];
  }
}

const M = GetNodeResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:get-node-response:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:get-node-response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:get-node-response:v1';

M.NODE_FIELD = 'node';

M.FIELDS = [
  M.NODE_FIELD,
];
