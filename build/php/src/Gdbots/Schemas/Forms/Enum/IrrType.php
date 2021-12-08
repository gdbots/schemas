<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Forms\Enum;

enum IrrType: string
{
    case UNKNOWN = 'unknown';
    case ACCESS_DATA = 'access-data';
    case DELETE_DATA = 'delete-data';
    case DO_NOT_SELL = 'do-not-sell';
    case OPTOUT = 'optout';
}
