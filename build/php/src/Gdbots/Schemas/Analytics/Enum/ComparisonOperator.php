<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Analytics\Enum;

enum ComparisonOperator: string
{
    case UNKNOWN = 'unknown';
    case EQUAL_TO = 'eq';
    case NOT_EQUAL_TO = 'ne';
    case GREATER_THAN = 'gt';
    case GREATER_THAN_OR_EQUAL_TO = 'gte';
    case LESS_THAN = 'lt';
    case LESS_THAN_OR_EQUAL_TO = 'lte';
    case EXISTS = 'exists';
    case IN = 'in';
    case CONTAINS = 'contains';
    case NOT_CONTAINS = 'not_contains';
    case WITHIN = 'within';
}
