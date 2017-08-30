// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/add-note-to-submission/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AddNoteToSubmissionV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:add-note-to-submission:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('submission_id', T.TimeUuidType.create())
        .required()
        .build(),
      Fb.create('note', T.TextType.create())
        .build(),
      Fb.create('hashtags_to_add', T.StringType.create())
        .asASet()
        .format(Format.HASHTAG)
        .build(),
      Fb.create('hashtags_to_remove', T.StringType.create())
        .asASet()
        .format(Format.HASHTAG)
        .build(),
    ];
  }
}
