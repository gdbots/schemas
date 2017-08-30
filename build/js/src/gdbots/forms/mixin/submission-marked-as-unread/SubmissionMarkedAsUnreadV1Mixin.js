// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/submission-marked-as-unread/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SubmissionMarkedAsUnreadV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:submission-marked-as-unread:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('submission_id', T.TimeUuidType.create())
        .required()
        .build(),
    ];
  }
}
