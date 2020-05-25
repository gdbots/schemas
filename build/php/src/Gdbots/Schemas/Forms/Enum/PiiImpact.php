<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Forms\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static PiiImpact UNKNOWN()
 * @method static PiiImpact HIGH()
 * @method static PiiImpact MODERATE()
 * @method static PiiImpact LOW()
 */
final class PiiImpact extends Enum
{
    const UNKNOWN = 'unknown';
    const HIGH = 'high';
    const MODERATE = 'moderate';
    const LOW = 'low';
}
