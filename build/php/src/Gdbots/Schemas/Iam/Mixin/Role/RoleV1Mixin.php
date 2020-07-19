<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/role/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\Role;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait RoleV1Mixin
{
    public function getUriTemplateVars(): array
    {
        return ['_id' => $this->fget('_id')];
    }
}
