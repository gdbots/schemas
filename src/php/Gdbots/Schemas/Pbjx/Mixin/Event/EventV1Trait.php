<?php

namespace Gdbots\Schemas\Pbjx\Mixin\Event;

use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait EventV1Trait
{
    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('event_id'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            'event_id' => (string)$this->get('event_id'),
            'occurred_at' => (string)$this->get('occurred_at'),
            'ctx_user_ref' => (string)$this->get('ctx_user_ref'),
        ];
    }
}
