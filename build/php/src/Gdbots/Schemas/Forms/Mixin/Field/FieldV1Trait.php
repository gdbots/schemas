<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Forms\Mixin\Field;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait FieldV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget(self::NAME_FIELD), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return ['name' => $this->fget(self::NAME_FIELD)];
    }
}
