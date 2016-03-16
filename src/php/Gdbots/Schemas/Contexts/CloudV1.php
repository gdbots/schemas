<?php

namespace Gdbots\Schemas\Contexts;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;

final class CloudV1 extends AbstractMessage implements
    Cloud
{

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:contexts::cloud:1-0-0', __CLASS__,
            [
                Fb::create('provider', T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG())
                    ->build(),
                Fb::create('region', T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG())
                    ->build(),
                Fb::create('zone', T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG())
                    ->build(),
                Fb::create('instance_id', T\StringType::create())
                    ->maxLength(50)
                    ->format(Format::SLUG())
                    ->build(),
                Fb::create('instance_type', T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG())
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
        return new MessageRef(static::schema()->getCurie(), $this->generateEtag(), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
          'provider' => (string)$this->get('provider'),
          'region' => (string)$this->get('region'),
          'zone' => (string)$this->get('zone'),
          'instance_id' => (string)$this->get('instance_id'),
          'instance_type' => (string)$this->get('instance_type'),
        ];
    }
}
