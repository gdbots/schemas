<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Mixin\Command;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait CommandV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget('command_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'command_id' => $this->fget('command_id'),
            'occurred_at' => $this->fget('occurred_at'),
            'ctx_user_ref' => $this->fget('ctx_user_ref'),
        ];
    }
}
