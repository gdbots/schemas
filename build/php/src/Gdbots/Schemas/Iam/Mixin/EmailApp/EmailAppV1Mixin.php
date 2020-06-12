<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/email-app/1-0-2.json#
namespace Gdbots\Schemas\Iam\Mixin\EmailApp;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class EmailAppV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:email-app:1-0-2';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:email-app';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:email-app:v1';

    const SENDGRID_API_KEY_FIELD = 'sendgrid_api_key';
    const SENDGRID_LISTS_FIELD = 'sendgrid_lists';
    const SENDGRID_SENDERS_FIELD = 'sendgrid_senders';
    const SENDGRID_SUPPRESSION_GROUP_ID_FIELD = 'sendgrid_suppression_group_id';

    const FIELDS = [
      self::SENDGRID_API_KEY_FIELD,
      self::SENDGRID_LISTS_FIELD,
      self::SENDGRID_SENDERS_FIELD,
      self::SENDGRID_SUPPRESSION_GROUP_ID_FIELD,
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
             * This field contains an access token (used as bearer token) and
             * in some cases SMTP username and password. It should be encrypted.
             * @link https://sendgrid.com/docs/ui/account-and-settings/api-keys/
             */
            Fb::create(self::SENDGRID_API_KEY_FIELD, T\TextType::create())
                ->build(),
            /*
             * Keys are list slugs, e.g. "newsletter-subscribers" and values are sendgrid list ids.
             * @link https://sendgrid.api-docs.io/v3.0/contacts-api-lists/create-a-list
             */
            Fb::create(self::SENDGRID_LISTS_FIELD, T\IntType::create())
                ->asAMap()
                ->build(),
            /*
             * Keys are emails and values are sendgrid sender ids.
             * @link https://sendgrid.api-docs.io/v3.0/sender-identities-api/create-a-sender-identity
             */
            Fb::create(self::SENDGRID_SENDERS_FIELD, T\IntType::create())
                ->asAMap()
                ->build(),
            /*
             * The default sendgrid suppression group id.
             */
            Fb::create(self::SENDGRID_SUPPRESSION_GROUP_ID_FIELD, T\IntType::create())
                ->build(),
        ];
    }
}
