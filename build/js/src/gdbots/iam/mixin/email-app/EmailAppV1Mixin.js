// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/email-app/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class EmailAppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:email-app:1-0-1');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * This field contains an access token (used as bearer token) and
       * in some cases SMTP username and password. It should be encrypted.
       * @link https://sendgrid.com/docs/ui/account-and-settings/api-keys/
       */
      Fb.create('sendgrid_api_key', T.TextType.create())
        .build(),
    ];
  }
}
