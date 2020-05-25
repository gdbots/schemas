<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/expirable/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Expirable;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class ExpirableV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:expirable:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:expirable';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:expirable:v1';

    const EXPIRES_AT_FIELD = 'expires_at';

    const FIELDS = [
      self::EXPIRES_AT_FIELD,
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
            Fb::create(self::EXPIRES_AT_FIELD, T\DateTimeType::create())
                ->build(),
        ];
    }
}
