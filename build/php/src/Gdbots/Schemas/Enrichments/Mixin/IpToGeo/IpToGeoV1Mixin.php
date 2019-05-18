<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/ip-to-geo/1-0-1.json#
namespace Gdbots\Schemas\Enrichments\Mixin\IpToGeo;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Geo\Address as GdbotsGeoAddress;

final class IpToGeoV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:enrichments:mixin:ip-to-geo:1-0-1');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('ctx_ip', T\StringType::create())
                ->format(Format::IPV4())
                ->overridable(true)
                ->build(),
            Fb::create('ctx_ipv6', T\StringType::create())
                ->format(Format::IPV6())
                ->overridable(true)
                ->build(),
            Fb::create('ctx_ip_geo', T\MessageType::create())
                ->anyOfClassNames([
                    GdbotsGeoAddress::class,
                ])
                ->build(),
        ];
    }
}
