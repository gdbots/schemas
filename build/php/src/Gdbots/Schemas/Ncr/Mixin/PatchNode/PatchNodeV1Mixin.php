<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/patch-node/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\PatchNode;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class PatchNodeV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:patch-node:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:patch-node';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:patch-node:v1';

    const NODE_REF_FIELD = 'node_ref';
    const PATHS_FIELD = 'paths';

    const FIELDS = [
      self::NODE_REF_FIELD,
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
