<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Analytics\Enum;

enum StreamControl: int
{
    case UNKNOWN = 0;
    case CTRL_STOP = 0;
    case CTRL_CONTINUE = 1;
}
