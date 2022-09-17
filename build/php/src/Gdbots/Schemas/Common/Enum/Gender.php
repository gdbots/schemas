<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Common\Enum;

enum Gender: int
{
    case UNKNOWN = 0;
    case MALE = 1;
    case FEMALE = 2;
    case NON_BINARY = 3;
    case NOT_SPECIFIED = 9;
}
