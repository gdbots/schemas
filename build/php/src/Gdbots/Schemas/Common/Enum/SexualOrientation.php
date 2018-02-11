<?php

namespace Gdbots\Schemas\Common\Enum;

use Gdbots\Common\Enum;

/**
 * @method static SexualOrientation UNKNOWN()
 * @method static SexualOrientation HETEROSEXUAL()
 * @method static SexualOrientation HOMOSEXUAL()
 * @method static SexualOrientation BISEXUAL()
 * @method static SexualOrientation OTHER()
 * @method static SexualOrientation NOT_SURE()
 * @method static SexualOrientation NOT_SPECIFIED()
 */
final class SexualOrientation extends Enum
{
    const UNKNOWN = 'unknown';
    const HETEROSEXUAL = '1';
    const HOMOSEXUAL = '2';
    const BISEXUAL = '3';
    const OTHER = '4';
    const NOT_SURE = 'U';
    const NOT_SPECIFIED = 'Z';
}
