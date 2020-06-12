<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/common/mixin/taggable/1-0-0.json#
namespace Gdbots\Schemas\Common\Mixin\Taggable;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class TaggableV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:common:mixin:taggable:1-0-0';
    const SCHEMA_CURIE = 'gdbots:common:mixin:taggable';
    const SCHEMA_CURIE_MAJOR = 'gdbots:common:mixin:taggable:v1';

    const TAGS_FIELD = 'tags';

    const FIELDS = [
      self::TAGS_FIELD,
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
             * Tags is a map that categorizes data or tracks references in
             * external systems. The tags names should be consistent and descriptive,
             * e.g. fb_user_id:123, salesforce_customer_id:456.
             */
            Fb::create(self::TAGS_FIELD, T\StringType::create())
                ->asAMap()
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
        ];
    }
}
