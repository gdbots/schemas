<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/apple-news-app/1-0-1.json#
namespace Gdbots\Schemas\Iam\Mixin\AppleNewsApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class AppleNewsAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:apple-news-app:1-0-1');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * The "channel_id" comes from Apple News and is not a secret so it does
             * not require encryption. It is usually a version 4 uuid.
             * @link https://developer.apple.com/documentation/apple_news/apple_news_api/about_the_news_security_model
             */
            Fb::create('channel_id', T\StringType::create())
                ->pattern('^[\w-]+$')
                ->build(),
            /*
             * The "api_key" comes from Apple News and is not a secret so it does
             * not require encryption. It is usually a version 4 uuid (similar to channel_id).
             */
            Fb::create('api_key', T\StringType::create())
                ->pattern('^[\w-]+$')
                ->build(),
            /*
             * The "api_secret" should be encrypted and never stored in plain text.
             */
            Fb::create('api_secret', T\TextType::create())
                ->build(),
        ];
    }
}
