<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Forms\Mixin\Field;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait FieldV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget('name'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return ['name' => $this->fget('name')];
    }
}
