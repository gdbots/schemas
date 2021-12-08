<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Analytics\Enum;

enum Interval: string
{
    case UNKNOWN = 'unknown';
    case MINUTELY = 'minutely';
    case HOURLY = 'hourly';
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';
}
