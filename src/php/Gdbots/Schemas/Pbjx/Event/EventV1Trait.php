<?php

namespace Gdbots\Schemas\Pbjx\Event;

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
            'microtime' => (string)$this->get('microtime'),
        ];
    }
}
