<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/response/1-0-2.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Response;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait ResponseV1Mixin
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget('response_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'response_id' => $this->fget('response_id'),
            'created_at' => $this->fget('created_at'),
            'ctx_tenant_id' => $this->fget('ctx_tenant_id'),
        ];
    }
}
