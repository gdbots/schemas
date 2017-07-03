<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/geo/address/1-0-1.json#
namespace Gdbots\Schemas\Geo;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;

final class AddressV1 extends AbstractMessage implements
    Address
{
    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:geo::address:1-0-1', __CLASS__,
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
            ]
        );
    }

    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('geo_hash'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            'geo_hash' => $this->get('geo_hash'),
            'geo_point' => (string)$this->get('geo_point'),
        ];
    }
}
