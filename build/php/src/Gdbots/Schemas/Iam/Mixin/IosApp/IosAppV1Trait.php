<?php

namespace Gdbots\Schemas\Iam\Mixin\IosApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait IosAppV1Trait
{
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            '_id' => (string)$this->get('_id'),
        ];
    }
}
