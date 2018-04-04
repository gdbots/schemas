<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam;

use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Iam\Mixin\User\UserV1Mixin;
use Gdbots\Schemas\Ncr\NodeRef;

final class UserId extends UuidIdentifier
{
    /**
     * @return NodeRef
     */
    public function toNodeRef(): NodeRef
    {
        return new NodeRef(UserV1Mixin::findOne()->getQName(), $this->toString());
    }
}
