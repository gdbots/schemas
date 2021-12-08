<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/cloud/1-0-0.json#
namespace Gdbots\Schemas\Contexts;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\MessageRef;

final class CloudV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:contexts::cloud:1-0-0';
    const SCHEMA_CURIE = 'gdbots:contexts::cloud';
    const SCHEMA_CURIE_MAJOR = 'gdbots:contexts::cloud:v1';
    const MIXINS = [];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('provider', T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG)
                    ->build(),
                Fb::create('region', T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG)
                    ->build(),
                Fb::create('zone', T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG)
                    ->build(),
                Fb::create('instance_id', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create('instance_type', T\StringType::create())
                    ->maxLength(20)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->generateEtag(), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
          'provider' => $this->fget('provider'),
          'region' => $this->fget('region'),
          'zone' => $this->fget('zone'),
          'instance_id' => $this->fget('instance_id'),
          'instance_type' => $this->fget('instance_type'),
        ];
    }
}
