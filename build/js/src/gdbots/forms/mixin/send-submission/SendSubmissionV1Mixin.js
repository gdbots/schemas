// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/send-submission/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import FileId from '@gdbots/schemas/gdbots/common/FileId';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SendSubmissionV1Mixin {
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
       * Contains answers submitted from the fields on the form.
       */
      Fb.create(this.CF_FIELD, T.DynamicFieldType.create())
        .asAList()
        .build(),
      /*
       * Any files uploaded should have the IDs copied here in addition to
       * being present in the "cf" field (or whereever they are mapped to).
       */
      Fb.create(this.FILE_IDS_FIELD, T.IdentifierType.create())
        .asASet()
        .classProto(FileId)
        .build(),
      /*
       * Publisher provided identifier (PPID)
       */
      Fb.create(this.PPID_FIELD, T.StringType.create())
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create(this.HASHTAGS_FIELD, T.StringType.create())
        .asASet()
        .format(Format.HASHTAG)
        .build(),
    ];
  }
}

const M = SendSubmissionV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:forms:mixin:send-submission:1-0-0';
M.SCHEMA_CURIE = 'gdbots:forms:mixin:send-submission';
M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:send-submission:v1';

M.FORM_REF_FIELD = 'form_ref';
M.CF_FIELD = 'cf';
M.FILE_IDS_FIELD = 'file_ids';
M.PPID_FIELD = 'ppid';
M.HASHTAGS_FIELD = 'hashtags';

M.FIELDS = [
  M.FORM_REF_FIELD,
  M.CF_FIELD,
  M.FILE_IDS_FIELD,
  M.PPID_FIELD,
  M.HASHTAGS_FIELD,
];
