<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Common\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static PhoneType UNKNOWN()
 * @method static PhoneType MOBILE()
 * @method static PhoneType HOME()
 * @method static PhoneType WORK()
 * @method static PhoneType FAX()
 */
final class PhoneType extends Enum
{
    const UNKNOWN = 'unknown';
    const MOBILE = 'mobile';
    const HOME = 'home';
    const WORK = 'work';
    const FAX = 'fax';
}
