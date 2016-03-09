<?php

namespace Gdbots\Schemas\Enrichments\TimeSampling;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class TimeSamplingV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:enrichments:mixin:time-sampling:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('ts_ymdh', T\IntType::create())
                ->build(),
            Fb::create('ts_ymd', T\IntType::create())
                ->build(),
            Fb::create('ts_ym', T\MediumIntType::create())
                ->build(),
        ];
    }
}
