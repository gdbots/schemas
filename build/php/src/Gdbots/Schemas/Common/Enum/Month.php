<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Common\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static Month UNKNOWN()
 * @method static Month JANUARY()
 * @method static Month FEBRUARY()
 * @method static Month MARCH()
 * @method static Month APRIL()
 * @method static Month MAY()
 * @method static Month JUNE()
 * @method static Month JULY()
 * @method static Month AUGUST()
 * @method static Month SEPTEMBER()
 * @method static Month OCTOBER()
 * @method static Month NOVEMBER()
 * @method static Month DECEMBER()
 */
final class Month extends Enum
{
    const UNKNOWN = 0;
    const JANUARY = 1;
    const FEBRUARY = 2;
    const MARCH = 3;
    const APRIL = 4;
    const MAY = 5;
    const JUNE = 6;
    const JULY = 7;
    const AUGUST = 8;
    const SEPTEMBER = 9;
    const OCTOBER = 10;
    const NOVEMBER = 11;
    const DECEMBER = 12;
}
