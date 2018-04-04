<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam;

use Gdbots\Pbj\WellKnown\SlugIdentifier;
use Gdbots\Schemas\Iam\Mixin\Role\RoleV1Mixin;
use Gdbots\Schemas\Ncr\NodeRef;

/**
 * A role id is just a friendly slug identifer.
 * e.g. "super-user", "publisher", "ring-bearer"
 *
 */
final class RoleId extends SlugIdentifier
{
    /**
     * @return NodeRef
     */
    public function toNodeRef(): NodeRef
    {
        return new NodeRef(RoleV1Mixin::findOne()->getQName(), $this->toString());
    }
}
