<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/sluggable/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Sluggable;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class SluggableV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:sluggable:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:sluggable';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:sluggable:v1';

    const SLUG_FIELD = 'slug';

    const FIELDS = [
      self::SLUG_FIELD,
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
             * The "slug" is a secondary identifier, typically used in a url:
             * - MUST be url friendly
             * - SHOULD NOT be case sensitive
             * - SHOULD be unique within the message curie namespace
             * - CAN be changed, but in practice once nodes are published you should avoid it if possible
             */
            Fb::create(self::SLUG_FIELD, T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
        ];
    }
}
