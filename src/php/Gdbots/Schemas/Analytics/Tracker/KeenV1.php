<?php

namespace Gdbots\Schemas\Analytics\Tracker;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Analytics\Mixin\Tracker\TrackerV1;
use Gdbots\Schemas\Analytics\Mixin\Tracker\TrackerV1Mixin;
use Gdbots\Schemas\Analytics\Mixin\Tracker\TrackerV1Trait;

final class KeenV1 extends AbstractMessage implements
    Keen,
    TrackerV1
  
{
    use TrackerV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:analytics:tracker:keen:1-0-0', __CLASS__,
            [
                Fb::create('project_id', T\StringType::create())
                    ->pattern('^\w+$')
                    ->build(),
                Fb::create('read_key', T\StringType::create())
                    ->pattern('^\w+$')
                    ->build(),
                Fb::create('write_key', T\StringType::create())
                    ->pattern('^\w+$')
                    ->build()
            ],
            [
                TrackerV1Mixin::create()
            ]
        );
    }

    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('project_id'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            'project_id' => $this->get('project_id'),
            'read_key' => $this->get('read_key'),
            'write_key' => $this->get('write_key'),
        ];
    }
}
