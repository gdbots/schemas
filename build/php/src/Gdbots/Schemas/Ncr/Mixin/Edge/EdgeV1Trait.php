<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Ncr\Mixin\Edge;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;
use Gdbots\Schemas\Ncr\EdgeId;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait EdgeV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), EdgeId::fromEdge($this)->toString(), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'edge_id' => EdgeId::fromEdge($this)->toString(),
            'from_ref' => $this->fget('from_ref'),
            'to_ref' => $this->fget('to_ref'),
            'created_at' => $this->fget('created_at'),
        ];
    }
}
