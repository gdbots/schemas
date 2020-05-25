<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static Code OK()
 * @method static Code CANCELLED()
 * @method static Code UNKNOWN()
 * @method static Code INVALID_ARGUMENT()
 * @method static Code DEADLINE_EXCEEDED()
 * @method static Code NOT_FOUND()
 * @method static Code ALREADY_EXISTS()
 * @method static Code PERMISSION_DENIED()
 * @method static Code UNAUTHENTICATED()
 * @method static Code RESOURCE_EXHAUSTED()
 * @method static Code FAILED_PRECONDITION()
 * @method static Code ABORTED()
 * @method static Code OUT_OF_RANGE()
 * @method static Code UNIMPLEMENTED()
 * @method static Code INTERNAL()
 * @method static Code UNAVAILABLE()
 * @method static Code DATA_LOSS()
 */
final class Code extends Enum
{
    const OK = 0;
    const CANCELLED = 1;
    const UNKNOWN = 2;
    const INVALID_ARGUMENT = 3;
    const DEADLINE_EXCEEDED = 4;
    const NOT_FOUND = 5;
    const ALREADY_EXISTS = 6;
    const PERMISSION_DENIED = 7;
    const UNAUTHENTICATED = 16;
    const RESOURCE_EXHAUSTED = 8;
    const FAILED_PRECONDITION = 9;
    const ABORTED = 10;
    const OUT_OF_RANGE = 11;
    const UNIMPLEMENTED = 12;
    const INTERNAL = 13;
    const UNAVAILABLE = 14;
    const DATA_LOSS = 15;
}
