<?php

namespace Gdbots\Schemas\Ncr\Mixin\Edge;

use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Ncr\EdgeId;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait EdgeV1Trait
{
    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        /** @var Edge $this */
        return new MessageRef(static::schema()->getCurie(), EdgeId::fromEdge($this), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        /** @var Edge $this */
        return [
            'edge_id' => EdgeId::fromEdge($this)->toString(),
            'from_ref' => (string)$this->get('from_ref'),
            'to_ref' => (string)$this->get('to_ref'),
            'created_at' => (string)$this->get('created_at'),
        ];
    }
}
