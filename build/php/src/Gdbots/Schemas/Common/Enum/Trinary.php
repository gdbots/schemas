<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Common\Enum;

enum Trinary: int
{
    case UNKNOWN = 0;
    case TRUE_VAL = 1;
    case FALSE_VAL = 2;
}
