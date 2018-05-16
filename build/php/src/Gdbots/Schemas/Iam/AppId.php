<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam;

use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Iam\Mixin\App\AppV1Mixin;
use Gdbots\Schemas\Ncr\NodeRef;

final class AppId extends UuidIdentifier
{
    /**
     * @return NodeRef
     */
    public function toNodeRef(): NodeRef
    {
        return new NodeRef(AppV1Mixin::findOne()->getQName(), $this->toString());
    }
}
