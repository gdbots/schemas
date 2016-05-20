<?php

namespace Gdbots\Schemas\Pbjx\Enum;

use Gdbots\Common\Enum;

/**
 * @method static SearchSort UNKNOWN()
 * @method static SearchSort RELEVANCE()
 * @method static SearchSort DATE_DESC()
 * @method static SearchSort DATE_ASC()
 */
final class SearchSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const DATE_DESC = 'date-desc';
    const DATE_ASC = 'date-asc';
}
