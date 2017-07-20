<?php

namespace Gdbots\Tests\Schemas\Ncr;

use Gdbots\Schemas\Ncr\EdgeId;
use Gdbots\Schemas\Ncr\NodeRef;
use Gdbots\Tests\Schemas\Ncr\Fixtures\SampleEdge;
use PHPUnit\Framework\TestCase;

class EdgeIdTest extends TestCase
{
    public function testFromEdge()
    {
        $edge = SampleEdge::create()
            ->set('from_ref', NodeRef::fromString('acme:article:123'))
            ->set('to_ref', NodeRef::fromString('acme:video:abc'));
        $edgeId = EdgeId::fromEdge($edge);

        $expected = 'ef510a74-6c90-5441-9fff-b9d6a6569cda';
        $this->assertSame($expected, $edgeId->toString());
        $this->assertSame($expected, EdgeId::fromString($edgeId->toString())->toString());
    }
}
