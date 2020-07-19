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

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('geo_hash', T\StringType::create())
                    ->maxLength(20)
                    ->pattern('^\w+$')
                    ->build(),
                Fb::create('geo_point', T\GeoPointType::create())
                    ->build(),
                /*
                 * Indicates if a verification has been run on this address.
                 */
                Fb::create('verified', T\BooleanType::create())
                    ->build(),
                /*
                 * Indicates if this is a valid adddress or not. Generally only true if the
                 * verified field is also true.
                 */
                Fb::create('is_verified', T\BooleanType::create())
                    ->build(),
                Fb::create('street1', T\StringType::create())
                    ->build(),
                Fb::create('street2', T\StringType::create())
                    ->maxLength(20)
                    ->build(),
                Fb::create('po_box', T\StringType::create())
                    ->maxLength(20)
                    ->build(),
                Fb::create('city', T\StringType::create())
                    ->maxLength(100)
                    ->build(),
                Fb::create('county', T\StringType::create())
                    ->maxLength(100)
                    ->build(),
                /*
                 * A two letter alpha or numeric code indicating the region, e.g. "CA".
                 * @link http://www.maxmind.com/download/geoip/misc/region_codes.csv
                 */
                Fb::create('region', T\StringType::create())
                    ->pattern('^[A-Z0-9]{2}$')
                    ->build(),
                /*
                 * The full name of the region, e.g. "California".
                 */
                Fb::create('region_name', T\StringType::create())
                    ->maxLength(150)
                    ->build(),
                Fb::create('postal_code', T\StringType::create())
                    ->maxLength(30)
                    ->pattern('^[\w\s-]+$')
                    ->build(),
                Fb::create('country', T\StringType::create())
                    ->pattern('^[A-Z]{2}$')
                    ->build(),
                Fb::create('continent', T\StringType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget('geo_hash'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'geo_hash' => $this->fget('geo_hash'),
        ];
    }
}
