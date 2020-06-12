<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/search-nodes-response/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\SearchNodesResponse;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class SearchNodesResponseV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:search-nodes-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:search-nodes-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:search-nodes-response:v1';

    const TOTAL_FIELD = 'total';
    const HAS_MORE_FIELD = 'has_more';
    const TIME_TAKEN_FIELD = 'time_taken';
    const MAX_SCORE_FIELD = 'max_score';
    const CURSORS_FIELD = 'cursors';
    const NODES_FIELD = 'nodes';

    const FIELDS = [
      self::TOTAL_FIELD,
      self::HAS_MORE_FIELD,
      self::TIME_TAKEN_FIELD,
      self::MAX_SCORE_FIELD,
      self::CURSORS_FIELD,
      self::NODES_FIELD,
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
             * The total number of nodes matching the search.
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
             * The maximum score of a matching node from the entire search.
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
            Fb::create(self::NODES_FIELD, T\MessageType::create())
                ->asAList()
                ->anyOfCuries([
                    'gdbots:ncr:mixin:node',
                ])
                ->overridable(true)
                ->build(),
        ];
    }
}
