<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Analytics\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static StreamControl UNKNOWN()
 * @method static StreamControl CTRL_STOP()
 * @method static StreamControl CTRL_CONTINUE()
 */
final class StreamControl extends Enum
{
    const UNKNOWN = 0;
    const CTRL_STOP = 0;
    const CTRL_CONTINUE = 1;
}
