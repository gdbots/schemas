<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/request/1-0-3.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Request;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait RequestV1Mixin
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget('request_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'request_id' => $this->fget('request_id'),
            'occurred_at' => $this->fget('occurred_at'),
            'ctx_tenant_id' => $this->fget('ctx_tenant_id'),
            'ctx_user_ref' => $this->fget('ctx_user_ref'),
        ];
    }
}
