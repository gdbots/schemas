<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Common\Enum;

enum SexualOrientation: string
{
    case UNKNOWN = 'unknown';
    case HETEROSEXUAL = '1';
    case HOMOSEXUAL = '2';
    case BISEXUAL = '3';
    case OTHER = '4';
    case NOT_SURE = 'U';
    case NOT_SPECIFIED = 'Z';
}
