<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/search-events-request/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Mixin\SearchEventsRequest;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Enum\SearchEventsSort;

final class SearchEventsRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:search-events-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:pbjx:mixin:search-events-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:search-events-request:v1';

    const Q_FIELD = 'q';
    const COUNT_FIELD = 'count';
    const PAGE_FIELD = 'page';
    const CURSOR_FIELD = 'cursor';
    const SORT_FIELD = 'sort';
    const OCCURRED_AFTER_FIELD = 'occurred_after';
    const OCCURRED_BEFORE_FIELD = 'occurred_before';
    const FIELDS_USED_FIELD = 'fields_used';
    const PARSED_QUERY_JSON_FIELD = 'parsed_query_json';

    const FIELDS = [
      self::Q_FIELD,
      self::COUNT_FIELD,
      self::PAGE_FIELD,
      self::CURSOR_FIELD,
      self::SORT_FIELD,
      self::OCCURRED_AFTER_FIELD,
      self::OCCURRED_BEFORE_FIELD,
      self::FIELDS_USED_FIELD,
      self::PARSED_QUERY_JSON_FIELD,
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
            Fb::create(self::Q_FIELD, T\TextType::create())
                ->maxLength(2000)
                ->build(),
            /*
             * The number of results to return.
             */
            Fb::create(self::COUNT_FIELD, T\TinyIntType::create())
                ->withDefault(25)
                ->build(),
            Fb::create(self::PAGE_FIELD, T\TinyIntType::create())
                ->min(1)
                ->withDefault(1)
                ->build(),
            /*
             * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
             * When cursor is present it should be used instead of "page".
             */
            Fb::create(self::CURSOR_FIELD, T\StringType::create())
                ->build(),
            Fb::create(self::SORT_FIELD, T\StringEnumType::create())
                ->withDefault(SearchEventsSort::RELEVANCE())
                ->className(SearchEventsSort::class)
                ->build(),
            Fb::create(self::OCCURRED_AFTER_FIELD, T\DateTimeType::create())
                ->build(),
            Fb::create(self::OCCURRED_BEFORE_FIELD, T\DateTimeType::create())
                ->build(),
            /*
             * The fields that are being queried as determined by parsing the "q" field.
             */
            Fb::create(self::FIELDS_USED_FIELD, T\StringType::create())
                ->asASet()
                ->pattern('^[\w\.-]+$')
                ->build(),
            Fb::create(self::PARSED_QUERY_JSON_FIELD, T\TextType::create())
                ->build(),
        ];
    }
}
