<?php

namespace Gdbots\Schemas\Ncr\Enum;

use Gdbots\Common\Enum;

/**
 * @method static NodeStatus UNKNOWN()
 * @method static NodeStatus PUBLISHED()
 * @method static NodeStatus SCHEDULED()
 * @method static NodeStatus PENDING()
 * @method static NodeStatus DRAFT()
 * @method static NodeStatus EXPIRED()
 * @method static NodeStatus ARCHIVED()
 * @method static NodeStatus DELETED()
 */
final class NodeStatus extends Enum
{
    const UNKNOWN = 'unknown';
    const PUBLISHED = 'published';
    const SCHEDULED = 'scheduled';
    const PENDING = 'pending';
    const DRAFT = 'draft';
    const EXPIRED = 'expired';
    const ARCHIVED = 'archived';
    const DELETED = 'deleted';
}
