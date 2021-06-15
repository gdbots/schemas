<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/twitter-app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\TwitterApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class TwitterAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:twitter-app:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * Equivalent to username of your Twitter developer app when making API requests.
             * @link https://developer.twitter.com/en/docs/authentication/oauth-1-0a
             */
            Fb::create('oauth_consumer_key', T\StringType::create())
                ->pattern('^[\w-]+$')
                ->build(),
            /*
             * Equivalent to password of your Twitter developer app when making API requests.
             * The "oauth_consumer_secret" should be encrypted and never stored in plain text.
             * @link https://developer.twitter.com/en/docs/authentication/oauth-1-0a
             */
            Fb::create('oauth_consumer_secret', T\TextType::create())
                ->build(),
            /*
             * An oauth token is a user-specific credentials used to authenticate OAuth 1.0a API requests.
             * It specifies the Twitter account the request is made on behalf of.
             * @link https://developer.twitter.com/en/docs/authentication/oauth-1-0a
             */
            Fb::create('oauth_token', T\StringType::create())
                ->pattern('^[\w-]+$')
                ->build(),
            /*
             * An oauth token secret is a user-specific credentials used to authenticate OAuth 1.0a API requests.
             * It specifies the Twitter account the request is made on behalf of.
             * The "oauth_token_secret" should be encrypted and never stored in plain text.
             * @link https://developer.twitter.com/en/docs/authentication/oauth-1-0a
             */
            Fb::create('oauth_token_secret', T\TextType::create())
                ->build(),
        ];
    }
}
