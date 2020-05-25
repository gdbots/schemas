// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-upload-url-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetUploadUrlRequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:get-upload-url-request:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('form_ref', T.NodeRefType.create())
        .required()
        .build(),
      /*
       * A unique identifier (within the form) for the field.
       */
      Fb.create('field_name', T.StringType.create())
        .required()
        .maxLength(127)
        .pattern('^[a-zA-Z_]{1}[\\w-]*$')
        .build(),
      Fb.create('client_file_name', T.StringType.create())
        .required()
        .build(),
    ];
  }
}
