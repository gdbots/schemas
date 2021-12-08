<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Forms\Enum;

enum PiiImpact: string
{
    case UNKNOWN = 'unknown';
    case HIGH = 'high';
    case MODERATE = 'moderate';
    case LOW = 'low';
}
