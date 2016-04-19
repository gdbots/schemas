<?php

namespace Gdbots\Schemas\Pbjx\Mixin\Request;

use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait RequestV1Trait
{
    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('request_id'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            'stream_id' => $this->get('stream_id'),
            'request_id' => (string)$this->get('request_id'),
            'occurred_at' => (string)$this->get('occurred_at'),
            'ctx_user_ref' => (string)$this->get('ctx_user_ref'),
        ];
    }
}
