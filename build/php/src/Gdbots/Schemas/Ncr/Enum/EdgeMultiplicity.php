<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Ncr\Enum;

enum EdgeMultiplicity: string
{
    case UNKNOWN = 'unknown';
    case MULTI = 'multi';
    case SIMPLE = 'simple';
    case MANY2ONE = 'many2one';
    case ONE2MANY = 'one2many';
    case ONE2ONE = 'one2one';
}
