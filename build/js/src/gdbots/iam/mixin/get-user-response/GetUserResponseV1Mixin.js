// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/get-user-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetUserResponseV1Mixin {
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
          'gdbots:iam:mixin:user',
        ])
        .build(),
    ];
  }
}

const M = GetUserResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:get-user-response:1-0-0';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:get-user-response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:get-user-response:v1';

M.NODE_FIELD = 'node';

M.FIELDS = [
  M.NODE_FIELD,
];
