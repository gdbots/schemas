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

    const PROVIDER_FIELD = 'provider';
    const REGION_FIELD = 'region';
    const ZONE_FIELD = 'zone';
    const INSTANCE_ID_FIELD = 'instance_id';
    const INSTANCE_TYPE_FIELD = 'instance_type';

    const FIELDS = [
      self::PROVIDER_FIELD,
      self::REGION_FIELD,
      self::ZONE_FIELD,
      self::INSTANCE_ID_FIELD,
      self::INSTANCE_TYPE_FIELD,
    ];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::PROVIDER_FIELD, T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG())
                    ->build(),
                Fb::create(self::REGION_FIELD, T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG())
                    ->build(),
                Fb::create(self::ZONE_FIELD, T\StringType::create())
                    ->maxLength(20)
                    ->format(Format::SLUG())
                    ->build(),
                Fb::create(self::INSTANCE_ID_FIELD, T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create(self::INSTANCE_TYPE_FIELD, T\StringType::create())
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
          'provider' => $this->fget(self::PROVIDER_FIELD),
          'region' => $this->fget(self::REGION_FIELD),
          'zone' => $this->fget(self::ZONE_FIELD),
          'instance_id' => $this->fget(self::INSTANCE_ID_FIELD),
          'instance_type' => $this->fget(self::INSTANCE_TYPE_FIELD),
        ];
    }
}
