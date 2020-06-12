<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/publishable/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Publishable;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class PublishableV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:publishable:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:publishable';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:publishable:v1';

    const PUBLISHED_AT_FIELD = 'published_at';

    const FIELDS = [
      self::PUBLISHED_AT_FIELD,
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
            Fb::create(self::PUBLISHED_AT_FIELD, T\DateTimeType::create())
                ->build(),
        ];
    }
}
