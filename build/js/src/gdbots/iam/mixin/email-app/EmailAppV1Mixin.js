// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/email-app/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class EmailAppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:email-app:1-0-2');
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
      /*
       * Keys are list slugs, e.g. "newsletter-subscribers" and values are sendgrid list ids.
       * @link https://sendgrid.api-docs.io/v3.0/contacts-api-lists/create-a-list
       */
      Fb.create('sendgrid_lists', T.IntType.create())
        .asAMap()
        .build(),
      /*
       * Keys are emails and values are sendgrid sender ids.
       * @link https://sendgrid.api-docs.io/v3.0/sender-identities-api/create-a-sender-identity
       */
      Fb.create('sendgrid_senders', T.IntType.create())
        .asAMap()
        .build(),
      /*
       * The default sendgrid suppression group id.
       */
      Fb.create('sendgrid_suppression_group_id', T.IntType.create())
        .build(),
    ];
  }
}
