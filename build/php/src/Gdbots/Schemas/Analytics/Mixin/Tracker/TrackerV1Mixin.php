<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/mixin/tracker/1-0-0.json#
namespace Gdbots\Schemas\Analytics\Mixin\Tracker;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class TrackerV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:analytics:mixin:tracker:1-0-0';
    const SCHEMA_CURIE = 'gdbots:analytics:mixin:tracker';
    const SCHEMA_CURIE_MAJOR = 'gdbots:analytics:mixin:tracker:v1';

    const IS_ENABLED_FIELD = 'is_enabled';

    const FIELDS = [
      self::IS_ENABLED_FIELD,
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
            Fb::create(self::IS_ENABLED_FIELD, T\BooleanType::create())
                ->build(),
        ];
    }
}
