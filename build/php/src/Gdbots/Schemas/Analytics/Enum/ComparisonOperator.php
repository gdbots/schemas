<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Analytics\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static ComparisonOperator UNKNOWN()
 * @method static ComparisonOperator EQUAL_TO()
 * @method static ComparisonOperator NOT_EQUAL_TO()
 * @method static ComparisonOperator GREATER_THAN()
 * @method static ComparisonOperator GREATER_THAN_OR_EQUAL_TO()
 * @method static ComparisonOperator LESS_THAN()
 * @method static ComparisonOperator LESS_THAN_OR_EQUAL_TO()
 * @method static ComparisonOperator EXISTS()
 * @method static ComparisonOperator IN()
 * @method static ComparisonOperator CONTAINS()
 * @method static ComparisonOperator NOT_CONTAINS()
 * @method static ComparisonOperator WITHIN()
 */
final class ComparisonOperator extends Enum
{
    const UNKNOWN = 'unknown';
    const EQUAL_TO = 'eq';
    const NOT_EQUAL_TO = 'ne';
    const GREATER_THAN = 'gt';
    const GREATER_THAN_OR_EQUAL_TO = 'gte';
    const LESS_THAN = 'lt';
    const LESS_THAN_OR_EQUAL_TO = 'lte';
    const EXISTS = 'exists';
    const IN = 'in';
    const CONTAINS = 'contains';
    const NOT_CONTAINS = 'not_contains';
    const WITHIN = 'within';
}
