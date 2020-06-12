<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/edge/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Edge;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\EdgeMultiplicity;

final class EdgeV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:edge:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:edge';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:edge:v1';

    const FROM_REF_FIELD = 'from_ref';
    const TO_REF_FIELD = 'to_ref';
    const MULTIPLICITY_FIELD = 'multiplicity';
    const CREATED_AT_FIELD = 'created_at';

    const FIELDS = [
      self::FROM_REF_FIELD,
      self::TO_REF_FIELD,
      self::MULTIPLICITY_FIELD,
      self::CREATED_AT_FIELD,
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
            Fb::create(self::FROM_REF_FIELD, T\NodeRefType::create())
                ->required()
                ->build(),
            Fb::create(self::TO_REF_FIELD, T\NodeRefType::create())
                ->required()
                ->build(),
            Fb::create(self::MULTIPLICITY_FIELD, T\StringEnumType::create())
                ->withDefault(EdgeMultiplicity::MULTI())
                ->className(EdgeMultiplicity::class)
                ->overridable(true)
                ->build(),
            Fb::create(self::CREATED_AT_FIELD, T\MicrotimeType::create())
                ->build(),
        ];
    }
}
