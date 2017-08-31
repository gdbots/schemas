// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/send-submission/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import FileId from '@gdbots/schemas/gdbots/files/FileId';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SendSubmissionV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:send-submission:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('form_ref', T.IdentifierType.create())
        .required()
        .classProto(NodeRef)
        .build(),
      /*
       * Contains answers submitted from the fields on the form.
       */
      Fb.create('cf', T.DynamicFieldType.create())
        .asAList()
        .build(),
      /*
       * Any files uploaded should have the IDs copied here in addition to
       * being present in the "cf" field (or whereever they are mapped to).
       */
      Fb.create('file_ids', T.IdentifierType.create())
        .asASet()
        .classProto(FileId)
        .build(),
      /*
       * Publisher provided identifier (PPID)
       */
      Fb.create('ppid', T.StringType.create())
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create('hashtags', T.StringType.create())
        .asASet()
        .format(Format.HASHTAG)
        .build(),
    ];
  }
}
