// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/get-user-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetUserRequestV1Mixin {
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
      Fb.create(this.EMAIL_FIELD, T.StringType.create())
        .format(Format.EMAIL)
        .build(),
    ];
  }
}

const M = GetUserRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:get-user-request:1-0-0';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:get-user-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:get-user-request:v1';

M.EMAIL_FIELD = 'email';

M.FIELDS = [
  M.EMAIL_FIELD,
];
