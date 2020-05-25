<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Mixin\Event;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait EventV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget(self::EVENT_ID_FIELD), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'event_id' => $this->fget(self::EVENT_ID_FIELD),
            'occurred_at' => $this->fget(self::OCCURRED_AT_FIELD),
            'ctx_user_ref' => $this->fget(self::CTX_USER_REF_FIELD),
        ];
    }
}
