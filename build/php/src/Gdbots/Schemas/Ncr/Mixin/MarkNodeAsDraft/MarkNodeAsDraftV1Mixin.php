<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/mark-node-as-draft/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\MarkNodeAsDraft;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class MarkNodeAsDraftV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:mark-node-as-draft:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:mark-node-as-draft';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:mark-node-as-draft:v1';

    const NODE_REF_FIELD = 'node_ref';

    const FIELDS = [
      self::NODE_REF_FIELD,
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
        ];
    }
}
