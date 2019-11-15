<?php

namespace Gdbots\Schemas\Forms\Enum;

use Gdbots\Common\Enum;

/**
 * @method static IrrType UNKNOWN()
 * @method static IrrType ACCESS_DATA()
 * @method static IrrType DELETE_DATA()
 * @method static IrrType DO_NOT_SELL()
 * @method static IrrType OPTOUT()
 */
final class IrrType extends Enum
{
    const UNKNOWN = 'unknown';
    const ACCESS_DATA = 'access-data';
    const DELETE_DATA = 'delete-data';
    const DO_NOT_SELL = 'do-not-sell';
    const OPTOUT = 'optout';
}
