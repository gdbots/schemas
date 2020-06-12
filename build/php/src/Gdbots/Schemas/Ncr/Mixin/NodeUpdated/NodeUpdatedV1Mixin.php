<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-updated/1-0-1.json#
namespace Gdbots\Schemas\Ncr\Mixin\NodeUpdated;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class NodeUpdatedV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:node-updated:1-0-1';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:node-updated';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:node-updated:v1';

    const NODE_REF_FIELD = 'node_ref';
    const SLUG_FIELD = 'slug';
    const NEW_ETAG_FIELD = 'new_etag';
    const OLD_ETAG_FIELD = 'old_etag';
    const NEW_NODE_FIELD = 'new_node';
    const OLD_NODE_FIELD = 'old_node';
    const PATHS_FIELD = 'paths';

    const FIELDS = [
      self::NODE_REF_FIELD,
      self::SLUG_FIELD,
      self::NEW_ETAG_FIELD,
      self::OLD_ETAG_FIELD,
      self::NEW_NODE_FIELD,
      self::OLD_NODE_FIELD,
      self::PATHS_FIELD,
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
            Fb::create(self::SLUG_FIELD, T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
            Fb::create(self::NEW_ETAG_FIELD, T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build(),
            Fb::create(self::OLD_ETAG_FIELD, T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build(),
            Fb::create(self::NEW_NODE_FIELD, T\MessageType::create())
                ->required()
                ->anyOfCuries([
                    'gdbots:ncr:mixin:node',
                ])
                ->overridable(true)
                ->build(),
            /*
             * The entire node, as it appeared before it was modified.
             */
            Fb::create(self::OLD_NODE_FIELD, T\MessageType::create())
                ->anyOfCuries([
                    'gdbots:ncr:mixin:node',
                ])
                ->overridable(true)
                ->build(),
            /*
             * The names of the fields this update event should apply changes to.
             * Nested paths can be referenced using dot notation.
             */
            Fb::create(self::PATHS_FIELD, T\StringType::create())
                ->asASet()
                ->pattern('^[a-zA-Z_]{1}[\w\.]*$')
                ->build(),
        ];
    }
}
