<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/update-node/1-0-1.json#
namespace Gdbots\Schemas\Ncr\Mixin\UpdateNode;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class UpdateNodeV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:update-node:1-0-1';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:update-node';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:update-node:v1';

    const NODE_REF_FIELD = 'node_ref';
    const NEW_NODE_FIELD = 'new_node';
    const OLD_NODE_FIELD = 'old_node';
    const PATHS_FIELD = 'paths';

    const FIELDS = [
      self::NODE_REF_FIELD,
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
             * The names of the fields this update command should apply changes to.
             * Nested paths can be referenced using dot notation.
             */
            Fb::create(self::PATHS_FIELD, T\StringType::create())
                ->asASet()
                ->pattern('^[a-zA-Z_]{1}[\w\.]*$')
                ->build(),
        ];
    }
}
