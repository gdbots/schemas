<?php

namespace Gdbots\Schemas\Pbjx\Request;

use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait ResponseV1Trait
{
    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('response_id'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            'response_id' => (string)$this->get('response_id'),
            'created_at' => (string)$this->get('created_at'),
        ];
    }
}
