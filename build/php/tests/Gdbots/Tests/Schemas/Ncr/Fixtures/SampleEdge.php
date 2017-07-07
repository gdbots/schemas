<?php

namespace Gdbots\Tests\Schemas\Ncr\Fixtures;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1 as GdbotsNcrEdgeV1;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1Mixin as GdbotsNcrEdgeV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1Trait as GdbotsNcrEdgeV1Trait;

final class SampleEdge extends AbstractMessage implements GdbotsNcrEdgeV1
{
    use GdbotsNcrEdgeV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:tests.schemas.ncr:fixtures:sample-edge:1-0-0', __CLASS__,
            [],
            [
                GdbotsNcrEdgeV1Mixin::create(),
            ]
        );
    }
}
