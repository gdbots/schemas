<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static SearchEventsSort UNKNOWN()
 * @method static SearchEventsSort RELEVANCE()
 * @method static SearchEventsSort DATE_DESC()
 * @method static SearchEventsSort DATE_ASC()
 */
final class SearchEventsSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const DATE_DESC = 'date-desc';
    const DATE_ASC = 'date-asc';
}
