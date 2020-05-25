<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/mixin/tracked-message/1-0-0.json#
namespace Gdbots\Schemas\Analytics\Mixin\TrackedMessage;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\SchemaId;

final class TrackedMessageV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:analytics:mixin:tracked-message:1-0-0';
    const SCHEMA_CURIE = 'gdbots:analytics:mixin:tracked-message';
    const SCHEMA_CURIE_MAJOR = 'gdbots:analytics:mixin:tracked-message:v1';

    const FIELDS = [];

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
        return [];
    }
}
