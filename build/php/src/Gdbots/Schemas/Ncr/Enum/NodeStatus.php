<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Ncr\Enum;

enum NodeStatus: string
{
    case UNKNOWN = 'unknown';
    case PUBLISHED = 'published';
    case SCHEDULED = 'scheduled';
    case PENDING = 'pending';
    case DRAFT = 'draft';
    case EXPIRED = 'expired';
    case ARCHIVED = 'archived';
    case DELETED = 'deleted';
}
