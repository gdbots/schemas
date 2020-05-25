<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam\Mixin\AppleNewsApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait AppleNewsAppV1Trait
{
    public function getUriTemplateVars(): array
    {
        return [
            '_id' => $this->fget('_id'),
            'channel_id' => $this->fget('channel_id'),
            'api_key' => $this->fget('api_key'),
        ];
    }
}
