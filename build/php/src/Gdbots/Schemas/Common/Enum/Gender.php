<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Common\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static Gender UNKNOWN()
 * @method static Gender MALE()
 * @method static Gender FEMALE()
 * @method static Gender NOT_SPECIFIED()
 */
final class Gender extends Enum
{
    const UNKNOWN = 0;
    const MALE = 1;
    const FEMALE = 2;
    const NOT_SPECIFIED = 9;
}
