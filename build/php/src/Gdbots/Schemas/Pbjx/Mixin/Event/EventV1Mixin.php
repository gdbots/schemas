<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/event/1-0-2.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Event;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait EventV1Mixin
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget('event_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'event_id' => $this->fget('event_id'),
            'occurred_at' => $this->fget('occurred_at'),
            'ctx_tenant_id' => $this->fget('ctx_tenant_id'),
            'ctx_user_ref' => $this->fget('ctx_user_ref'),
        ];
    }
}
