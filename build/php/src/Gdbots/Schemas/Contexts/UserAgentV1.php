<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/user-agent/1-0-0.json#
namespace Gdbots\Schemas\Contexts;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\MessageRef;

final class UserAgentV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:contexts::user-agent:1-0-0';
    const SCHEMA_CURIE = 'gdbots:contexts::user-agent';
    const SCHEMA_CURIE_MAJOR = 'gdbots:contexts::user-agent:v1';

    const MIXINS = [];

    const BR_FAMILY_FIELD = 'br_family';
    const BR_MAJOR_FIELD = 'br_major';
    const BR_MINOR_FIELD = 'br_minor';
    const BR_PATCH_FIELD = 'br_patch';
    const OS_FAMILY_FIELD = 'os_family';
    const OS_MAJOR_FIELD = 'os_major';
    const OS_MINOR_FIELD = 'os_minor';
    const OS_PATCH_FIELD = 'os_patch';
    const OS_PATCH_MINOR_FIELD = 'os_patch_minor';
    const DVCE_FAMILY_FIELD = 'dvce_family';

    const FIELDS = [
      self::BR_FAMILY_FIELD,
      self::BR_MAJOR_FIELD,
      self::BR_MINOR_FIELD,
      self::BR_PATCH_FIELD,
      self::OS_FAMILY_FIELD,
      self::OS_MAJOR_FIELD,
      self::OS_MINOR_FIELD,
      self::OS_PATCH_FIELD,
      self::OS_PATCH_MINOR_FIELD,
      self::DVCE_FAMILY_FIELD,
    ];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::BR_FAMILY_FIELD, T\StringType::create())
                    ->pattern('.+')
                    ->build(),
                Fb::create(self::BR_MAJOR_FIELD, T\SmallIntType::create())
                    ->build(),
                Fb::create(self::BR_MINOR_FIELD, T\SmallIntType::create())
                    ->build(),
                Fb::create(self::BR_PATCH_FIELD, T\SmallIntType::create())
                    ->build(),
                Fb::create(self::OS_FAMILY_FIELD, T\StringType::create())
                    ->pattern('.+')
                    ->build(),
                Fb::create(self::OS_MAJOR_FIELD, T\SmallIntType::create())
                    ->build(),
                Fb::create(self::OS_MINOR_FIELD, T\SmallIntType::create())
                    ->build(),
                Fb::create(self::OS_PATCH_FIELD, T\SmallIntType::create())
                    ->build(),
                Fb::create(self::OS_PATCH_MINOR_FIELD, T\SmallIntType::create())
                    ->build(),
                Fb::create(self::DVCE_FAMILY_FIELD, T\StringType::create())
                    ->pattern('.+')
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->generateEtag(), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return ['ua_hash' => $this->generateEtag()];
    }
}
