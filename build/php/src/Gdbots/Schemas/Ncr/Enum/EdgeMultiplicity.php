<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Ncr\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static EdgeMultiplicity UNKNOWN()
 * @method static EdgeMultiplicity MULTI()
 * @method static EdgeMultiplicity SIMPLE()
 * @method static EdgeMultiplicity MANY2ONE()
 * @method static EdgeMultiplicity ONE2MANY()
 * @method static EdgeMultiplicity ONE2ONE()
 */
final class EdgeMultiplicity extends Enum
{
    const UNKNOWN = 'unknown';
    const MULTI = 'multi';
    const SIMPLE = 'simple';
    const MANY2ONE = 'many2one';
    const ONE2MANY = 'one2many';
    const ONE2ONE = 'one2one';
}
