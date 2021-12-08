<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Enum;

enum SearchEventsSort: string
{
    case UNKNOWN = 'unknown';
    case RELEVANCE = 'relevance';
    case DATE_DESC = 'date-desc';
    case DATE_ASC = 'date-asc';
}
