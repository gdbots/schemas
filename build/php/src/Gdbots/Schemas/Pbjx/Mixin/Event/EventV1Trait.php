<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Mixin\Event;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait EventV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget('event_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'event_id' => $this->fget('event_id'),
            'occurred_at' => $this->fget('occurred_at'),
            'ctx_user_ref' => $this->fget('ctx_user_ref'),
        ];
    }
}
