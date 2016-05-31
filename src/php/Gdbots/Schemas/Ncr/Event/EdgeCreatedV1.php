<?php

namespace Gdbots\Schemas\Ncr\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait;

final class EdgeCreatedV1 extends AbstractMessage implements
    EdgeCreated,
    EventV1
  
{
    use EventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:ncr:event:edge-created:1-0-0', __CLASS__,
            [
                Fb::create('edge', T\MessageType::create())
                    ->className('Gdbots\Schemas\Ncr\Mixin\Edge\Edge')
                    ->build()
            ],
            [
                EventV1Mixin::create()
            ]
        );
    }
}