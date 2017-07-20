<?php

namespace Gdbots\Schemas\Forms\Mixin\Field;

use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait FieldV1Trait
{
    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('name'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return ['name' => $this->get('name')];
    }
}
