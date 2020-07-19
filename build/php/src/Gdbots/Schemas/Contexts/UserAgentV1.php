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

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('br_family', T\StringType::create())
                    ->pattern('.+')
                    ->build(),
                Fb::create('br_major', T\SmallIntType::create())
                    ->build(),
                Fb::create('br_minor', T\SmallIntType::create())
                    ->build(),
                Fb::create('br_patch', T\SmallIntType::create())
                    ->build(),
                Fb::create('os_family', T\StringType::create())
                    ->pattern('.+')
                    ->build(),
                Fb::create('os_major', T\SmallIntType::create())
                    ->build(),
                Fb::create('os_minor', T\SmallIntType::create())
                    ->build(),
                Fb::create('os_patch', T\SmallIntType::create())
                    ->build(),
                Fb::create('os_patch_minor', T\SmallIntType::create())
                    ->build(),
                Fb::create('dvce_family', T\StringType::create())
                    ->pattern('.+')
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
        return ['ua_hash' => $this->generateEtag()];
    }
}
