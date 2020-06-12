<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/app-roles-granted/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\AppRolesGranted;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class AppRolesGrantedV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:app-roles-granted:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:app-roles-granted';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:app-roles-granted:v1';

    const NODE_REF_FIELD = 'node_ref';
    const ROLES_FIELD = 'roles';

    const FIELDS = [
      self::NODE_REF_FIELD,
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
            Fb::create(self::NODE_REF_FIELD, T\NodeRefType::create())
                ->required()
                ->build(),
            /*
             * The roles granted to the app.
             */
            Fb::create(self::ROLES_FIELD, T\NodeRefType::create())
                ->asASet()
                ->build(),
        ];
    }
}
