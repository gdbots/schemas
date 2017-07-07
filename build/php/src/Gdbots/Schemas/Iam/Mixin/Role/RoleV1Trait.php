<?php

namespace Gdbots\Schemas\Iam\Mixin\Role;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait RoleV1Trait
{
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return ['role_id' => (string)$this->get('_id')];
    }
}
