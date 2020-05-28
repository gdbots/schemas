<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Mixin\Response;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait ResponseV1Trait
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget(self::RESPONSE_ID_FIELD), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'response_id' => $this->fget(self::RESPONSE_ID_FIELD),
            'created_at' => $this->fget(self::CREATED_AT_FIELD),
            'ctx_tenant_id' => $this->fget(self::CTX_TENANT_ID_FIELD),
        ];
    }
}
