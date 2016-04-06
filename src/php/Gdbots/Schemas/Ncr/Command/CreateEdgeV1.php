<?php

namespace Gdbots\Schemas\Ncr\Command;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Command\CommandV1;
use Gdbots\Schemas\Pbjx\Command\CommandV1Mixin;
use Gdbots\Schemas\Pbjx\Command\CommandV1Trait;

final class CreateEdgeV1 extends AbstractMessage implements
    CreateEdge,
    CommandV1
  
{
    use CommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:ncr:command:create-edge:1-0-0', __CLASS__,
            [
                Fb::create('edge', T\MessageType::create())
                    ->className('Gdbots\Schemas\Ncr\Edge\Edge')
                    ->build()
            ],
            [
                CommandV1Mixin::create()
            ]
        );
    }
}
