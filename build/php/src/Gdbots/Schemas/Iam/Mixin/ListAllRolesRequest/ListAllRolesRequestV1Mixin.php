<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/list-all-roles-request/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\ListAllRolesRequest;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\SchemaId;

final class ListAllRolesRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:list-all-roles-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:list-all-roles-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:list-all-roles-request:v1';

    const FIELDS = [];

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
        return [];
    }
}
