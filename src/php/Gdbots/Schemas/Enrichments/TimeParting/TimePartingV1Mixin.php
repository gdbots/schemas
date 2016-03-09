<?php

namespace Gdbots\Schemas\Enrichments\TimeParting;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Enum\DayOfWeek;
use Gdbots\Schemas\Common\Enum\Month;

final class TimePartingV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:enrichments:mixin:time-parting:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('month_of_year', T\IntEnumType::create())
                ->withDefault(Month::UNKNOWN())
                ->className('Gdbots\Schemas\Common\Enum\Month')
                ->build(),
            Fb::create('day_of_month', T\TinyIntType::create())
                ->max(31)
                ->build(),
            Fb::create('day_of_week', T\IntEnumType::create())
                ->withDefault(DayOfWeek::UNKNOWN())
                ->className('Gdbots\Schemas\Common\Enum\DayOfWeek')
                ->build(),
            Fb::create('hour_of_day', T\TinyIntType::create())
                ->max(23)
                ->build()
        ];
    }
}
