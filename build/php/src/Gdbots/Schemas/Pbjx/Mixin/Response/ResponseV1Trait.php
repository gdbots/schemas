<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Mixin\Response;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait ResponseV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget('response_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'response_id' => $this->fget('response_id'),
            'created_at' => $this->fget('created_at'),
        ];
    }
}
