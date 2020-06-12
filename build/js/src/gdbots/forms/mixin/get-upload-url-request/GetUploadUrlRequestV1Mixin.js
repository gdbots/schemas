// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-upload-url-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetUploadUrlRequestV1Mixin {
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
      Fb.create(this.FORM_REF_FIELD, T.NodeRefType.create())
        .required()
        .build(),
      /*
       * A unique identifier (within the form) for the field.
       */
      Fb.create(this.FIELD_NAME_FIELD, T.StringType.create())
        .required()
        .maxLength(127)
        .pattern('^[a-zA-Z_]{1}[\\w-]*$')
        .build(),
      Fb.create(this.CLIENT_FILE_NAME_FIELD, T.StringType.create())
        .required()
        .build(),
    ];
  }
}

const M = GetUploadUrlRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:forms:mixin:get-upload-url-request:1-0-0';
M.SCHEMA_CURIE = 'gdbots:forms:mixin:get-upload-url-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:get-upload-url-request:v1';

M.FORM_REF_FIELD = 'form_ref';
M.FIELD_NAME_FIELD = 'field_name';
M.CLIENT_FILE_NAME_FIELD = 'client_file_name';

M.FIELDS = [
  M.FORM_REF_FIELD,
  M.FIELD_NAME_FIELD,
  M.CLIENT_FILE_NAME_FIELD,
];
