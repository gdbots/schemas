<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/geo/address/1-0-2.json#
namespace Gdbots\Schemas\Geo;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\MessageRef;

final class AddressV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:geo::address:1-0-2';
    const SCHEMA_CURIE = 'gdbots:geo::address';
    const SCHEMA_CURIE_MAJOR = 'gdbots:geo::address:v1';

    const MIXINS = [];

    const GEO_HASH_FIELD = 'geo_hash';
    const GEO_POINT_FIELD = 'geo_point';
    const VERIFIED_FIELD = 'verified';
    const IS_VERIFIED_FIELD = 'is_verified';
    const STREET1_FIELD = 'street1';
    const STREET2_FIELD = 'street2';
    const PO_BOX_FIELD = 'po_box';
    const CITY_FIELD = 'city';
    const COUNTY_FIELD = 'county';
    const REGION_FIELD = 'region';
    const REGION_NAME_FIELD = 'region_name';
    const POSTAL_CODE_FIELD = 'postal_code';
    const COUNTRY_FIELD = 'country';
    const CONTINENT_FIELD = 'continent';

    const FIELDS = [
      self::GEO_HASH_FIELD,
      self::GEO_POINT_FIELD,
      self::VERIFIED_FIELD,
      self::IS_VERIFIED_FIELD,
      self::STREET1_FIELD,
      self::STREET2_FIELD,
      self::PO_BOX_FIELD,
      self::CITY_FIELD,
      self::COUNTY_FIELD,
      self::REGION_FIELD,
      self::REGION_NAME_FIELD,
      self::POSTAL_CODE_FIELD,
      self::COUNTRY_FIELD,
      self::CONTINENT_FIELD,
    ];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::GEO_HASH_FIELD, T\StringType::create())
                    ->maxLength(20)
                    ->pattern('^\w+$')
                    ->build(),
                Fb::create(self::GEO_POINT_FIELD, T\GeoPointType::create())
                    ->build(),
                /*
                 * Indicates if a verification has been run on this address.
                 */
                Fb::create(self::VERIFIED_FIELD, T\BooleanType::create())
                    ->build(),
                /*
                 * Indicates if this is a valid adddress or not. Generally only true if the
                 * verified field is also true.
                 */
                Fb::create(self::IS_VERIFIED_FIELD, T\BooleanType::create())
                    ->build(),
                Fb::create(self::STREET1_FIELD, T\StringType::create())
                    ->build(),
                Fb::create(self::STREET2_FIELD, T\StringType::create())
                    ->maxLength(20)
                    ->build(),
                Fb::create(self::PO_BOX_FIELD, T\StringType::create())
                    ->maxLength(20)
                    ->build(),
                Fb::create(self::CITY_FIELD, T\StringType::create())
                    ->maxLength(100)
                    ->build(),
                Fb::create(self::COUNTY_FIELD, T\StringType::create())
                    ->maxLength(100)
                    ->build(),
                /*
                 * A two letter alpha or numeric code indicating the region, e.g. "CA".
                 * @link http://www.maxmind.com/download/geoip/misc/region_codes.csv
                 */
                Fb::create(self::REGION_FIELD, T\StringType::create())
                    ->pattern('^[A-Z0-9]{2}$')
                    ->build(),
                /*
                 * The full name of the region, e.g. "California".
                 */
                Fb::create(self::REGION_NAME_FIELD, T\StringType::create())
                    ->maxLength(150)
                    ->build(),
                Fb::create(self::POSTAL_CODE_FIELD, T\StringType::create())
                    ->maxLength(30)
                    ->pattern('^[\w\s-]+$')
                    ->build(),
                Fb::create(self::COUNTRY_FIELD, T\StringType::create())
                    ->pattern('^[A-Z]{2}$')
                    ->build(),
                Fb::create(self::CONTINENT_FIELD, T\StringType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget(self::GEO_HASH_FIELD), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'geo_hash' => $this->fget(self::GEO_HASH_FIELD),
        ];
    }
}
