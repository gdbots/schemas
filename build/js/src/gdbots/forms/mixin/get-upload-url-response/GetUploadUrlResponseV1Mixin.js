// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-upload-url-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import FileId from '@gdbots/schemas/gdbots/files/FileId';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetUploadUrlResponseV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:get-upload-url-response:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * The id to use when sending the submission.
       */
      Fb.create('file_id', T.IdentifierType.create())
        .required()
        .classProto(FileId)
        .build(),
      /*
       * An S3 presigned URL where the client can upload the file.
       */
      Fb.create('s3_presigned_url', T.TextType.create())
        .format(Format.URL)
        .build(),
    ];
  }
}
