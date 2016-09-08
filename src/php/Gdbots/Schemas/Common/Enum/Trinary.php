<?php

namespace Gdbots\Schemas\Common\Enum;

use Gdbots\Common\Enum;

/**
 * @method static Trinary UNKNOWN()
 * @method static Trinary TRUE_VAL()
 * @method static Trinary FALSE_VAL()
 */
final class Trinary extends Enum
{
    const UNKNOWN = 0;
    const TRUE_VAL = 1;
    const FALSE_VAL = 2;
}
