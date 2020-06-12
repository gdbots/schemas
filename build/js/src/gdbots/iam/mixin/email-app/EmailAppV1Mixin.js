// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/email-app/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class EmailAppV1Mixin {
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
       * This field contains an access token (used as bearer token) and
       * in some cases SMTP username and password. It should be encrypted.
       * @link https://sendgrid.com/docs/ui/account-and-settings/api-keys/
       */
      Fb.create(this.SENDGRID_API_KEY_FIELD, T.TextType.create())
        .build(),
      /*
       * Keys are list slugs, e.g. "newsletter-subscribers" and values are sendgrid list ids.
       * @link https://sendgrid.api-docs.io/v3.0/contacts-api-lists/create-a-list
       */
      Fb.create(this.SENDGRID_LISTS_FIELD, T.IntType.create())
        .asAMap()
        .build(),
      /*
       * Keys are emails and values are sendgrid sender ids.
       * @link https://sendgrid.api-docs.io/v3.0/sender-identities-api/create-a-sender-identity
       */
      Fb.create(this.SENDGRID_SENDERS_FIELD, T.IntType.create())
        .asAMap()
        .build(),
      /*
       * The default sendgrid suppression group id.
       */
      Fb.create(this.SENDGRID_SUPPRESSION_GROUP_ID_FIELD, T.IntType.create())
        .build(),
    ];
  }
}

const M = EmailAppV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:email-app:1-0-2';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:email-app';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:email-app:v1';

M.SENDGRID_API_KEY_FIELD = 'sendgrid_api_key';
M.SENDGRID_LISTS_FIELD = 'sendgrid_lists';
M.SENDGRID_SENDERS_FIELD = 'sendgrid_senders';
M.SENDGRID_SUPPRESSION_GROUP_ID_FIELD = 'sendgrid_suppression_group_id';

M.FIELDS = [
  M.SENDGRID_API_KEY_FIELD,
  M.SENDGRID_LISTS_FIELD,
  M.SENDGRID_SENDERS_FIELD,
  M.SENDGRID_SUPPRESSION_GROUP_ID_FIELD,
];
