<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/time-parting/1-0-0.json#
namespace Gdbots\Schemas\Enrichments\Mixin\TimeParting;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Enum\DayOfWeek;
use Gdbots\Schemas\Common\Enum\Month;

final class TimePartingV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:time-parting:1-0-0';
    const SCHEMA_CURIE = 'gdbots:enrichments:mixin:time-parting';
    const SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:time-parting:v1';

    const MONTH_OF_YEAR_FIELD = 'month_of_year';
    const DAY_OF_MONTH_FIELD = 'day_of_month';
    const DAY_OF_WEEK_FIELD = 'day_of_week';
    const IS_WEEKEND_FIELD = 'is_weekend';
    const HOUR_OF_DAY_FIELD = 'hour_of_day';

    const FIELDS = [
      self::MONTH_OF_YEAR_FIELD,
      self::DAY_OF_MONTH_FIELD,
      self::DAY_OF_WEEK_FIELD,
      self::IS_WEEKEND_FIELD,
      self::HOUR_OF_DAY_FIELD,
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
            Fb::create(self::MONTH_OF_YEAR_FIELD, T\IntEnumType::create())
                ->withDefault(Month::UNKNOWN())
                ->className(Month::class)
                ->build(),
            Fb::create(self::DAY_OF_MONTH_FIELD, T\TinyIntType::create())
                ->max(31)
                ->build(),
            Fb::create(self::DAY_OF_WEEK_FIELD, T\IntEnumType::create())
                ->withDefault(DayOfWeek::UNKNOWN())
                ->className(DayOfWeek::class)
                ->build(),
            Fb::create(self::IS_WEEKEND_FIELD, T\BooleanType::create())
                ->build(),
            Fb::create(self::HOUR_OF_DAY_FIELD, T\TinyIntType::create())
                ->max(23)
                ->build(),
        ];
    }
}
