<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-renamed/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\NodeRenamed;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;

final class NodeRenamedV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:node-renamed:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:node-renamed';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:node-renamed:v1';

    const NODE_REF_FIELD = 'node_ref';
    const NODE_STATUS_FIELD = 'node_status';
    const NEW_SLUG_FIELD = 'new_slug';
    const OLD_SLUG_FIELD = 'old_slug';

    const FIELDS = [
      self::NODE_REF_FIELD,
      self::NODE_STATUS_FIELD,
      self::NEW_SLUG_FIELD,
      self::OLD_SLUG_FIELD,
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
            Fb::create(self::NODE_STATUS_FIELD, T\StringEnumType::create())
                ->className(NodeStatus::class)
                ->build(),
            Fb::create(self::NEW_SLUG_FIELD, T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
            Fb::create(self::OLD_SLUG_FIELD, T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
        ];
    }
}
