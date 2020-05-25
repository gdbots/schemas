<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam;

use Gdbots\Pbj\WellKnown\SlugIdentifier;

/**
 * A role id is just a friendly slug identifer.
 * e.g. "super-user", "publisher", "ring-bearer"
 */
final class RoleId extends SlugIdentifier
{
}
