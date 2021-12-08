<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Common\Enum;

enum PhoneType: string
{
    case UNKNOWN = 'unknown';
    case MOBILE = 'mobile';
    case HOME = 'home';
    case WORK = 'work';
    case FAX = 'fax';
}
