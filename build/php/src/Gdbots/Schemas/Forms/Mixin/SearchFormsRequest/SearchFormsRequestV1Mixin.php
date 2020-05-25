<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-forms-request/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\SearchFormsRequest;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Enum\SearchFormsSort;

final class SearchFormsRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:forms:mixin:search-forms-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:forms:mixin:search-forms-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:search-forms-request:v1';

    const SORT_FIELD = 'sort';

    const FIELDS = [
      self::SORT_FIELD,
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
                ->withDefault(SearchFormsSort::RELEVANCE())
                ->className(SearchFormsSort::class)
                ->build(),
        ];
    }
}
