// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/twitter-app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class TwitterAppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:twitter-app:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * Equivalent to username of your Twitter developer app when making API requests.
       * @link https://developer.twitter.com/en/docs/authentication/oauth-1-0a
       */
      Fb.create('oauth_consumer_key', T.StringType.create())
        .pattern('^[\\w-]+$')
        .build(),
      /*
       * Equivalent to password of your Twitter developer app when making API requests.
       * The "oauth_consumer_secret" should be encrypted and never stored in plain text.
       * @link https://developer.twitter.com/en/docs/authentication/oauth-1-0a
       */
      Fb.create('oauth_consumer_secret', T.TextType.create())
        .build(),
      /*
       * An oauth token is a user-specific credentials used to authenticate OAuth 1.0a API requests.
       * It specifies the Twitter account the request is made on behalf of.
       * @link https://developer.twitter.com/en/docs/authentication/oauth-1-0a
       */
      Fb.create('oauth_token', T.StringType.create())
        .pattern('^[\\w-]+$')
        .build(),
      /*
       * An oauth token secret is a user-specific credentials used to authenticate OAuth 1.0a API requests.
       * It specifies the Twitter account the request is made on behalf of.
       * The "oauth_token_secret" should be encrypted and never stored in plain text.
       * @link https://developer.twitter.com/en/docs/authentication/oauth-1-0a
       */
      Fb.create('oauth_token_secret', T.TextType.create())
        .build(),
    ];
  }
}
