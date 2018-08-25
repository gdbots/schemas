// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/email-app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class EmailAppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:email-app:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('sendgrid_api_key', T.StringType.create())
        .maxLength(512)
        .pattern('^[a-z0-9]+$')
        .build(),
    ];
  }
}