<?php

namespace Gdbots\Schemas\Pbjx\Request;

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
            'request_id' => (string)$this->get('request_id'),
            'microtime' => (string)$this->get('microtime'),
        ];
    }
}
