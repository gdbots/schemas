<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/ip-to-geo/1-0-1.json#
namespace Gdbots\Schemas\Enrichments\Mixin\IpToGeo;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class IpToGeoV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:ip-to-geo:1-0-1';
    const SCHEMA_CURIE = 'gdbots:enrichments:mixin:ip-to-geo';
    const SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:ip-to-geo:v1';

    const CTX_IP_FIELD = 'ctx_ip';
    const CTX_IPV6_FIELD = 'ctx_ipv6';
    const CTX_IP_GEO_FIELD = 'ctx_ip_geo';

    const FIELDS = [
      self::CTX_IP_FIELD,
      self::CTX_IPV6_FIELD,
      self::CTX_IP_GEO_FIELD,
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
            Fb::create(self::CTX_IP_FIELD, T\StringType::create())
                ->format(Format::IPV4())
                ->overridable(true)
                ->build(),
            Fb::create(self::CTX_IPV6_FIELD, T\StringType::create())
                ->format(Format::IPV6())
                ->overridable(true)
                ->build(),
            Fb::create(self::CTX_IP_GEO_FIELD, T\MessageType::create())
                ->anyOfCuries([
                    'gdbots:geo::address',
                ])
                ->build(),
        ];
    }
}
