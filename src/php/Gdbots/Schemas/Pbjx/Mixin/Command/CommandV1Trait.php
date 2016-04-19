<?php

namespace Gdbots\Schemas\Pbjx\Mixin\Command;

use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait CommandV1Trait
{
    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('command_id'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            'stream_id' => $this->get('stream_id'),
            'command_id' => (string)$this->get('command_id'),
            'occurred_at' => (string)$this->get('occurred_at'),
            'ctx_user_ref' => (string)$this->get('ctx_user_ref'),
        ];
    }
}
