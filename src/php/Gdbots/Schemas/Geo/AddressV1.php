<?php

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
        return new Schema('pbj:gdbots:geo::address:1-0-0', __CLASS__,
            [
                Fb::create('geo_hash', T\StringType::create())
                    ->maxLength(20)
                    ->pattern('^\w+$')
                    ->build(),
                Fb::create('geo_location', T\GeoPointType::create())
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
                    ->build(),
                Fb::create('province', T\StringType::create())
                    ->build(),
                Fb::create('postal_code', T\StringType::create())
                    ->maxLength(30)
                    ->pattern('^[\w\s-]+$')
                    ->build(),
                Fb::create('country', T\StringType::create())
                    ->pattern('^[A-Z]{2}$')
                    ->build(),
                Fb::create('continent', T\StringType::create())
                    ->build()
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
            'geo_hash' => (string)$this->get('geo_hash'),
            'geo_location' => (string)$this->get('geo_location'),
        ];
    }
}
