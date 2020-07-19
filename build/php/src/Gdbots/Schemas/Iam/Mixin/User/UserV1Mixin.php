<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/user/1-0-1.json#
namespace Gdbots\Schemas\Iam\Mixin\User;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait UserV1Mixin
{
    public function getUriTemplateVars(): array
    {
        return ['_id' => $this->fget('_id')];
    }
}
