<?php

namespace Gdbots\Schemas\Common\Enum;

use Gdbots\Common\Enum;

/**
 * @method static DayOfWeek UNKNOWN()
 * @method static DayOfWeek SUNDAY()
 * @method static DayOfWeek MONDAY()
 * @method static DayOfWeek TUESDAY()
 * @method static DayOfWeek WEDNESDAY()
 * @method static DayOfWeek THURSDAY()
 * @method static DayOfWeek FRIDAY()
 * @method static DayOfWeek SATURDAY()
 * @method static DayOfWeek SUNDAY_TOO()
 */
final class DayOfWeek extends Enum
{
    const UNKNOWN = 0;
    const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;
    const SUNDAY_TOO = 7;
}
