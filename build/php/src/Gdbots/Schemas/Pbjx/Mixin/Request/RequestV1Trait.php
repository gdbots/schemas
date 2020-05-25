<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Mixin\Request;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait RequestV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget('request_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'request_id' => $this->fget('request_id'),
            'occurred_at' => $this->fget('occurred_at'),
            'ctx_user_ref' => $this->fget('ctx_user_ref'),
        ];
    }
}
