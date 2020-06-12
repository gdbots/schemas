// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-upload-url-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import FileId from '@gdbots/schemas/gdbots/common/FileId';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetUploadUrlResponseV1Mixin {
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
      /*
       * The id to use when sending the submission.
       */
      Fb.create(this.FILE_ID_FIELD, T.IdentifierType.create())
        .required()
        .classProto(FileId)
        .build(),
      /*
       * An S3 presigned URL where the client can upload the file.
       */
      Fb.create(this.S3_PRESIGNED_URL_FIELD, T.TextType.create())
        .format(Format.URL)
        .build(),
    ];
  }
}

const M = GetUploadUrlResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:forms:mixin:get-upload-url-response:1-0-0';
M.SCHEMA_CURIE = 'gdbots:forms:mixin:get-upload-url-response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:get-upload-url-response:v1';

M.FILE_ID_FIELD = 'file_id';
M.S3_PRESIGNED_URL_FIELD = 's3_presigned_url';

M.FIELDS = [
  M.FILE_ID_FIELD,
  M.S3_PRESIGNED_URL_FIELD,
];
