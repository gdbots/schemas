<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/user/1-0-1.json#
namespace Gdbots\Schemas\Iam\Mixin\User;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class UserV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:user:1-0-1';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:user';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:user:v1';

    const FIRST_NAME_FIELD = 'first_name';
    const LAST_NAME_FIELD = 'last_name';
    const EMAIL_FIELD = 'email';
    const EMAIL_DOMAIN_FIELD = 'email_domain';
    const PHONE_FIELD = 'phone';
    const NETWORKS_FIELD = 'networks';
    const IS_BLOCKED_FIELD = 'is_blocked';
    const IS_STAFF_FIELD = 'is_staff';
    const ROLES_FIELD = 'roles';

    const FIELDS = [
      self::FIRST_NAME_FIELD,
      self::LAST_NAME_FIELD,
      self::EMAIL_FIELD,
      self::EMAIL_DOMAIN_FIELD,
      self::PHONE_FIELD,
      self::NETWORKS_FIELD,
      self::IS_BLOCKED_FIELD,
      self::IS_STAFF_FIELD,
      self::ROLES_FIELD,
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
            Fb::create(self::FIRST_NAME_FIELD, T\StringType::create())
                ->build(),
            Fb::create(self::LAST_NAME_FIELD, T\StringType::create())
                ->build(),
            Fb::create(self::EMAIL_FIELD, T\StringType::create())
                ->format(Format::EMAIL())
                ->build(),
            Fb::create(self::EMAIL_DOMAIN_FIELD, T\StringType::create())
                ->format(Format::HOSTNAME())
                ->build(),
            /*
             * A general format for international telephone numbers.
             * @link https://en.wikipedia.org/wiki/E.164
             */
            Fb::create(self::PHONE_FIELD, T\StringType::create())
                ->asAMap()
                ->pattern('^\+?[1-9]\d{1,14}$')
                ->build(),
            /*
             * Networks is a map that contains handles/usernames on a social network.
             * E.g. facebook:homer, twitter:stackoverflow, youtube:coltrane78.
             */
            Fb::create(self::NETWORKS_FIELD, T\StringType::create())
                ->asAMap()
                ->maxLength(50)
                ->pattern('^[\w\.-]+$')
                ->build(),
            Fb::create(self::IS_BLOCKED_FIELD, T\BooleanType::create())
                ->build(),
            /*
             * Indicates that the user is a staff member and has access to the cms, dashboard, etc.
             */
            Fb::create(self::IS_STAFF_FIELD, T\BooleanType::create())
                ->build(),
            /*
             * A user's roles determine what permissions they'll have when using the system.
             * The role itself is a node which has a set of "allow" and "deny" rules.
             */
            Fb::create(self::ROLES_FIELD, T\NodeRefType::create())
                ->asASet()
                ->build(),
        ];
    }
}
