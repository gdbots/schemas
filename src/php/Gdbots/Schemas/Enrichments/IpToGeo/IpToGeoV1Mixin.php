<?php

namespace Gdbots\Schemas\Enrichments\IpToGeo;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class IpToGeoV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:enrichments:mixin:ip-to-geo:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('ipv4', T\StringType::create())
                ->format(Format::IPV4())
                ->overridable(true)
                ->build()
        ];
    }
}
