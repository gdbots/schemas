<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/apple-news-app/1-0-1.json#
namespace Gdbots\Schemas\Iam\Mixin\AppleNewsApp;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class AppleNewsAppV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:apple-news-app:1-0-1';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:apple-news-app';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:apple-news-app:v1';

    const CHANNEL_ID_FIELD = 'channel_id';
    const API_KEY_FIELD = 'api_key';
    const API_SECRET_FIELD = 'api_secret';

    const FIELDS = [
      self::CHANNEL_ID_FIELD,
      self::API_KEY_FIELD,
      self::API_SECRET_FIELD,
    ];

    final private function __construct() {}

    public static function getId(): SchemaId
    {
        return SchemaId::fromString(self::SCHEMA_ID);
    }

    public static function hasField(string $name): bool
    {
        return in_array($name, self::FIELDS, true);
    }

    /**
     * @return Field[]
     */
    public static function getFields(): array
    {
        return [
            /*
             * The "channel_id" comes from Apple News and is not a secret so it does
             * not require encryption. It is usually a version 4 uuid.
             * @link https://developer.apple.com/documentation/apple_news/apple_news_api/about_the_news_security_model
             */
            Fb::create(self::CHANNEL_ID_FIELD, T\StringType::create())
                ->pattern('^[\w-]+$')
                ->build(),
            /*
             * The "api_key" comes from Apple News and is not a secret so it does
             * not require encryption. It is usually a version 4 uuid (similar to channel_id).
             */
            Fb::create(self::API_KEY_FIELD, T\StringType::create())
                ->pattern('^[\w-]+$')
                ->build(),
            /*
             * The "api_secret" should be encrypted and never stored in plain text.
             */
            Fb::create(self::API_SECRET_FIELD, T\TextType::create())
                ->build(),
        ];
    }
}
