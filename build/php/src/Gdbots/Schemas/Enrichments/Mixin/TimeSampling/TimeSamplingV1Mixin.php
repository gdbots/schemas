<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/time-sampling/1-0-0.json#
namespace Gdbots\Schemas\Enrichments\Mixin\TimeSampling;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class TimeSamplingV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:time-sampling:1-0-0';
    const SCHEMA_CURIE = 'gdbots:enrichments:mixin:time-sampling';
    const SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:time-sampling:v1';

    const TS_YMDH_FIELD = 'ts_ymdh';
    const TS_YMD_FIELD = 'ts_ymd';
    const TS_YM_FIELD = 'ts_ym';

    const FIELDS = [
      self::TS_YMDH_FIELD,
      self::TS_YMD_FIELD,
      self::TS_YM_FIELD,
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
            Fb::create(self::TS_YMDH_FIELD, T\IntType::create())
                ->build(),
            Fb::create(self::TS_YMD_FIELD, T\IntType::create())
                ->build(),
            Fb::create(self::TS_YM_FIELD, T\MediumIntType::create())
                ->build(),
        ];
    }
}
