// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/apple-news-app/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AppleNewsAppV1Mixin {
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
       * The "channel_id" comes from Apple News and is not a secret so it does
       * not require encryption. It is usually a version 4 uuid.
       * @link https://developer.apple.com/documentation/apple_news/apple_news_api/about_the_news_security_model
       */
      Fb.create(this.CHANNEL_ID_FIELD, T.StringType.create())
        .pattern('^[\\w-]+$')
        .build(),
      /*
       * The "api_key" comes from Apple News and is not a secret so it does
       * not require encryption. It is usually a version 4 uuid (similar to channel_id).
       */
      Fb.create(this.API_KEY_FIELD, T.StringType.create())
        .pattern('^[\\w-]+$')
        .build(),
      /*
       * The "api_secret" should be encrypted and never stored in plain text.
       */
      Fb.create(this.API_SECRET_FIELD, T.TextType.create())
        .build(),
    ];
  }
}

const M = AppleNewsAppV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:apple-news-app:1-0-1';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:apple-news-app';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:apple-news-app:v1';

M.CHANNEL_ID_FIELD = 'channel_id';
M.API_KEY_FIELD = 'api_key';
M.API_SECRET_FIELD = 'api_secret';

M.FIELDS = [
  M.CHANNEL_ID_FIELD,
  M.API_KEY_FIELD,
  M.API_SECRET_FIELD,
];
