<?php
declare(strict_types=1);

namespace Gdbots\Tests\Schemas\Ncr\Fixtures;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1Mixin as GdbotsNcrEdgeV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1Trait as GdbotsNcrEdgeV1Trait;

final class SampleEdge extends AbstractMessage
{
    use GdbotsNcrEdgeV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema('pbj:gdbots:tests.schemas.ncr:fixtures:sample-edge:1-0-0', __CLASS__,
            GdbotsNcrEdgeV1Mixin::getFields(),
            [
                GdbotsNcrEdgeV1Mixin::SCHEMA_CURIE_MAJOR,
                GdbotsNcrEdgeV1Mixin::SCHEMA_CURIE,
            ]
        );
    }
}
