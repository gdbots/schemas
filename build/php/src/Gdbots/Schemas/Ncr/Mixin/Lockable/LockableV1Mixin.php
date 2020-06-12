<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/lockable/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Lockable;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class LockableV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:lockable:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:lockable';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:lockable:v1';

    const IS_LOCKED_FIELD = 'is_locked';
    const LOCKED_BY_REF_FIELD = 'locked_by_ref';

    const FIELDS = [
      self::IS_LOCKED_FIELD,
      self::LOCKED_BY_REF_FIELD,
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
             * A node being locked will vary in how it's implemented but the
             * general idea is that only the user who locked it can modify it.
             */
            Fb::create(self::IS_LOCKED_FIELD, T\BooleanType::create())
                ->build(),
            /*
             * The user (or app) that has "locked" the node.
             */
            Fb::create(self::LOCKED_BY_REF_FIELD, T\NodeRefType::create())
                ->build(),
        ];
    }
}
