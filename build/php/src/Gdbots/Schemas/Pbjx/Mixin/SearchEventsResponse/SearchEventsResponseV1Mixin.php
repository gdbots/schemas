<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/search-events-response/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Mixin\SearchEventsResponse;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class SearchEventsResponseV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:search-events-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:pbjx:mixin:search-events-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:search-events-response:v1';

    const TOTAL_FIELD = 'total';
    const HAS_MORE_FIELD = 'has_more';
    const TIME_TAKEN_FIELD = 'time_taken';
    const MAX_SCORE_FIELD = 'max_score';
    const CURSORS_FIELD = 'cursors';
    const EVENTS_FIELD = 'events';

    const FIELDS = [
      self::TOTAL_FIELD,
      self::HAS_MORE_FIELD,
      self::TIME_TAKEN_FIELD,
      self::MAX_SCORE_FIELD,
      self::CURSORS_FIELD,
      self::EVENTS_FIELD,
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
             * The total number of events matching the search.
             */
            Fb::create(self::TOTAL_FIELD, T\IntType::create())
                ->build(),
            Fb::create(self::HAS_MORE_FIELD, T\BooleanType::create())
                ->build(),
            /*
             * How long in milliseconds it took to run the query.
             */
            Fb::create(self::TIME_TAKEN_FIELD, T\MediumIntType::create())
                ->build(),
            /*
             * The maximum score of a matching event from the entire search.
             */
            Fb::create(self::MAX_SCORE_FIELD, T\FloatType::create())
                ->build(),
            /*
             * Cursors are optionally provided by the underlying search system to allow for efficient
             * pagination. In the absense of cursors, paging is done using count and page number.
             */
            Fb::create(self::CURSORS_FIELD, T\StringType::create())
                ->asAMap()
                ->build(),
            Fb::create(self::EVENTS_FIELD, T\MessageType::create())
                ->asAList()
                ->anyOfCuries([
                    'gdbots:pbjx:mixin:event',
                ])
                ->overridable(true)
                ->build(),
        ];
    }
}
