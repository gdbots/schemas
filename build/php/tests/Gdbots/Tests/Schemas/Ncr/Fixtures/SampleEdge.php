<?php
declare(strict_types=1);

namespace Gdbots\Tests\Schemas\Ncr\Fixtures;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\EdgeMultiplicity;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1Mixin as GdbotsNcrEdgeV1Mixin;

final class SampleEdge extends AbstractMessage
{
    use GdbotsNcrEdgeV1Mixin;

    protected static function defineSchema(): Schema
    {
        return new Schema('pbj:gdbots:tests.schemas.ncr:fixtures:sample-edge:1-0-0', __CLASS__,
            [
                Fb::create('from_ref', T\NodeRefType::create())
                    ->required()
                    ->build(),
                Fb::create('to_ref', T\NodeRefType::create())
                    ->required()
                    ->build(),
                Fb::create('multiplicity', T\StringEnumType::create())
                    ->withDefault(EdgeMultiplicity::MULTI())
                    ->className(EdgeMultiplicity::class)
                    ->overridable(true)
                    ->build(),
                Fb::create('created_at', T\MicrotimeType::create())
                    ->build(),
            ],
            [
                'gdbots:ncr:mixin:edge:v1',
                'gdbots:ncr:mixin:edge',
            ]
        );
    }
}
