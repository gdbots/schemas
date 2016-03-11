<?php

namespace Gdbots\Schemas\Ncr\Enum;

use Gdbots\Common\Enum;

/**
 * @method static NodeStatus UNKNOWN()
 * @method static NodeStatus PUBLISHED()
 * @method static NodeStatus DRAFT()
 * @method static NodeStatus PENDING()
 * @method static NodeStatus EXPIRED()
 * @method static NodeStatus DELETED()
 */
final class NodeStatus extends Enum
{
    const UNKNOWN = 'unknown';
    const PUBLISHED = 'published';
    const DRAFT = 'draft';
    const PENDING = 'pending';
    const EXPIRED = 'expired';
    const DELETED = 'deleted';
}
