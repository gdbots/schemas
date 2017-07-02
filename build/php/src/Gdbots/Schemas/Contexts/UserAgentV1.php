<?php

namespace Gdbots\Schemas\Contexts;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;

final class UserAgentV1 extends AbstractMessage implements
    UserAgent
{
    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:contexts::user-agent:1-0-0', __CLASS__,
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
        return ['ua_hash' => $this->generateEtag()];
    }
}
