<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam\Mixin\SmsApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait SmsAppV1Trait
{
    public function getUriTemplateVars(): array
    {
        return [
            '_id' => $this->fget('_id'),
        ];
    }
}
