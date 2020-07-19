<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/command/1-0-3.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Command;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait CommandV1Mixin
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget('command_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'command_id' => $this->fget('command_id'),
            'occurred_at' => $this->fget('occurred_at'),
            'ctx_tenant_id' => $this->fget('ctx_tenant_id'),
            'ctx_user_ref' => $this->fget('ctx_user_ref'),
        ];
    }
}
