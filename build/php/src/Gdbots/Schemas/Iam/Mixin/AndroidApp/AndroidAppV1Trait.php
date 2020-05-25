<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam\Mixin\AndroidApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait AndroidAppV1Trait
{
    public function getUriTemplateVars(): array
    {
        return [
            '_id' => $this->fget('_id'),
        ];
    }
}
