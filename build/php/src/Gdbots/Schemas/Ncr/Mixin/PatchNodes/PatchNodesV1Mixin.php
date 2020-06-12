<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/patch-nodes/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\PatchNodes;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class PatchNodesV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:patch-nodes:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:patch-nodes';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:patch-nodes:v1';

    const NODE_REFS_FIELD = 'node_refs';
    const PATHS_FIELD = 'paths';

    const FIELDS = [
      self::NODE_REFS_FIELD,
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
            Fb::create(self::NODE_REFS_FIELD, T\NodeRefType::create())
                ->asASet()
                ->build(),
            /*
             * The names of the fields this patch command should apply changes to.
             * Nested paths can be referenced using dot notation.
             */
            Fb::create(self::PATHS_FIELD, T\StringType::create())
                ->asASet()
                ->pattern('^[a-zA-Z_]{1}[\w\.]*$')
                ->build(),
        ];
    }
}
