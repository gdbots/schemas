<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/search-nodes-request/1-0-3.json#
namespace Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;

final class SearchNodesRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:search-nodes-request:1-0-3';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:search-nodes-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:search-nodes-request:v1';

    const Q_FIELD = 'q';
    const COUNT_FIELD = 'count';
    const PAGE_FIELD = 'page';
    const AUTOCOMPLETE_FIELD = 'autocomplete';
    const CURSOR_FIELD = 'cursor';
    const STATUS_FIELD = 'status';
    const STATUSES_FIELD = 'statuses';
    const CREATED_AFTER_FIELD = 'created_after';
    const CREATED_BEFORE_FIELD = 'created_before';
    const UPDATED_AFTER_FIELD = 'updated_after';
    const UPDATED_BEFORE_FIELD = 'updated_before';
    const PUBLISHED_AFTER_FIELD = 'published_after';
    const PUBLISHED_BEFORE_FIELD = 'published_before';
    const FIELDS_USED_FIELD = 'fields_used';
    const PARSED_QUERY_JSON_FIELD = 'parsed_query_json';

    const FIELDS = [
      self::Q_FIELD,
      self::COUNT_FIELD,
      self::PAGE_FIELD,
      self::AUTOCOMPLETE_FIELD,
      self::CURSOR_FIELD,
      self::STATUS_FIELD,
      self::STATUSES_FIELD,
      self::CREATED_AFTER_FIELD,
      self::CREATED_BEFORE_FIELD,
      self::UPDATED_AFTER_FIELD,
      self::UPDATED_BEFORE_FIELD,
      self::PUBLISHED_AFTER_FIELD,
      self::PUBLISHED_BEFORE_FIELD,
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
            Fb::create(self::AUTOCOMPLETE_FIELD, T\BooleanType::create())
                ->build(),
            /*
             * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
             * When cursor is present it should be used instead of "page".
             */
            Fb::create(self::CURSOR_FIELD, T\StringType::create())
                ->build(),
            /*
             * The status a node must be in to match the search request.
             */
            Fb::create(self::STATUS_FIELD, T\StringEnumType::create())
                ->className(NodeStatus::class)
                ->build(),
            /*
             * A set of statuses (node must match at least one) to include in the search results.
             */
            Fb::create(self::STATUSES_FIELD, T\StringEnumType::create())
                ->asASet()
                ->className(NodeStatus::class)
                ->build(),
            Fb::create(self::CREATED_AFTER_FIELD, T\DateTimeType::create())
                ->build(),
            Fb::create(self::CREATED_BEFORE_FIELD, T\DateTimeType::create())
                ->build(),
            Fb::create(self::UPDATED_AFTER_FIELD, T\DateTimeType::create())
                ->build(),
            Fb::create(self::UPDATED_BEFORE_FIELD, T\DateTimeType::create())
                ->build(),
            Fb::create(self::PUBLISHED_AFTER_FIELD, T\DateTimeType::create())
                ->build(),
            Fb::create(self::PUBLISHED_BEFORE_FIELD, T\DateTimeType::create())
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
