<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam\Mixin\AndroidApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait AndroidAppV1Trait
{
    public function getUriTemplateVars(): array
    {
        return [
            '_id' => $this->fget(self::_ID_FIELD),
        ];
    }
}
