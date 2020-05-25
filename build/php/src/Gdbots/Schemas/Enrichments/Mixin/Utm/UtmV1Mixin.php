<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/utm/1-0-0.json#
namespace Gdbots\Schemas\Enrichments\Mixin\Utm;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class UtmV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:utm:1-0-0';
    const SCHEMA_CURIE = 'gdbots:enrichments:mixin:utm';
    const SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:utm:v1';

    const UTM_SOURCE_FIELD = 'utm_source';
    const UTM_MEDIUM_FIELD = 'utm_medium';
    const UTM_TERM_FIELD = 'utm_term';
    const UTM_CONTENT_FIELD = 'utm_content';
    const UTM_CAMPAIGN_FIELD = 'utm_campaign';

    const FIELDS = [
      self::UTM_SOURCE_FIELD,
      self::UTM_MEDIUM_FIELD,
      self::UTM_TERM_FIELD,
      self::UTM_CONTENT_FIELD,
      self::UTM_CAMPAIGN_FIELD,
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
            Fb::create(self::UTM_SOURCE_FIELD, T\StringType::create())
                ->maxLength(50)
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
            Fb::create(self::UTM_MEDIUM_FIELD, T\StringType::create())
                ->maxLength(50)
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
            Fb::create(self::UTM_TERM_FIELD, T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\s\/\.,:-]+$')
                ->build(),
            Fb::create(self::UTM_CONTENT_FIELD, T\StringType::create())
                ->maxLength(50)
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
            Fb::create(self::UTM_CAMPAIGN_FIELD, T\StringType::create())
                ->maxLength(50)
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
        ];
    }
}
