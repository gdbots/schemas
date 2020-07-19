<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/edge/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Edge;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;
use Gdbots\Schemas\Ncr\EdgeId;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait EdgeV1Mixin
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), EdgeId::fromEdge($this)->toString(), $tag);
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
