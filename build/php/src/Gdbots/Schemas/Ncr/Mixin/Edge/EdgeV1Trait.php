<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Ncr\Mixin\Edge;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;
use Gdbots\Schemas\Ncr\EdgeId;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait EdgeV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), EdgeId::fromEdge($this)->toString(), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'edge_id' => EdgeId::fromEdge($this)->toString(),
            'from_ref' => $this->fget(self::FROM_REF_FIELD),
            'to_ref' => $this->fget(self::TO_REF_FIELD),
            'created_at' => $this->fget(self::CREATED_AT_FIELD),
        ];
    }
}
