<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\App;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class AppV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:app:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:app';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:app:v1';

    const ROLES_FIELD = 'roles';

    const FIELDS = [
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
            /*
             * The roles determine what permissions this app will have when using the system.
             * The role itself is a node which has a set of "allow" and "deny" rules.
             */
            Fb::create(self::ROLES_FIELD, T\NodeRefType::create())
                ->asASet()
                ->build(),
        ];
    }
}
