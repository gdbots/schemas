<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Mixin\Command;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait CommandV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget(self::COMMAND_ID_FIELD), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'command_id' => $this->fget(self::COMMAND_ID_FIELD),
            'occurred_at' => $this->fget(self::OCCURRED_AT_FIELD),
            'ctx_user_ref' => $this->fget(self::CTX_USER_REF_FIELD),
        ];
    }
}
