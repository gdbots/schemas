<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Analytics\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static Interval UNKNOWN()
 * @method static Interval MINUTELY()
 * @method static Interval HOURLY()
 * @method static Interval DAILY()
 * @method static Interval WEEKLY()
 * @method static Interval MONTHLY()
 * @method static Interval YEARLY()
 */
final class Interval extends Enum
{
    const UNKNOWN = 'unknown';
    const MINUTELY = 'minutely';
    const HOURLY = 'hourly';
    const DAILY = 'daily';
    const WEEKLY = 'weekly';
    const MONTHLY = 'monthly';
    const YEARLY = 'yearly';
}
