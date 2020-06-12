<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Ncr\Mixin\Node;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait NodeV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget(self::_ID_FIELD), $tag);
    }
}
