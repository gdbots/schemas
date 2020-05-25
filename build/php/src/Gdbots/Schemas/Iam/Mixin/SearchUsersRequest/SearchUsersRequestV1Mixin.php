<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/search-users-request/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\SearchUsersRequest;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\Enum\SearchUsersSort;

final class SearchUsersRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:search-users-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:search-users-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:search-users-request:v1';

    const SORT_FIELD = 'sort';
    const IS_STAFF_FIELD = 'is_staff';
    const IS_BLOCKED_FIELD = 'is_blocked';

    const FIELDS = [
      self::SORT_FIELD,
      self::IS_STAFF_FIELD,
      self::IS_BLOCKED_FIELD,
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
            Fb::create(self::SORT_FIELD, T\StringEnumType::create())
                ->withDefault(SearchUsersSort::RELEVANCE())
                ->className(SearchUsersSort::class)
                ->build(),
            Fb::create(self::IS_STAFF_FIELD, T\TrinaryType::create())
                ->build(),
            Fb::create(self::IS_BLOCKED_FIELD, T\TrinaryType::create())
                ->withDefault(2)
                ->build(),
        ];
    }
}
