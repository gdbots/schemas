<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/role/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\Role;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\RoleId;

final class RoleV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:role:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:role';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:role:v1';

    const _ID_FIELD = '_id';
    const ALLOWED_FIELD = 'allowed';
    const DENIED_FIELD = 'denied';

    const FIELDS = [
      self::_ID_FIELD,
      self::ALLOWED_FIELD,
      self::DENIED_FIELD,
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
            Fb::create(self::_ID_FIELD, T\IdentifierType::create())
                ->required()
                ->className(RoleId::class)
                ->build(),
            /*
             * The "allowed" field is a set of actions that a user will be granted.
             * Although the string can be anything it is best practice to use the
             * curies of the pbjx commands and requests from your application.
             * E.g. "acme:blog:command:publish-article" or "acme:blog:command:*"
             */
            Fb::create(self::ALLOWED_FIELD, T\StringType::create())
                ->asASet()
                ->pattern('^[a-z0-9_\*\.:-]+$')
                ->build(),
            /*
             * The "denied" field works just like the "allowed" field with the
             * exception that these rules take precedence and deny a user's
             * ability to perform the action.
             */
            Fb::create(self::DENIED_FIELD, T\StringType::create())
                ->asASet()
                ->pattern('^[a-z0-9_\*\.:-]+$')
                ->build(),
        ];
    }
}
