<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam\Mixin\AppleNewsApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait AppleNewsAppV1Trait
{
    public function getUriTemplateVars(): array
    {
        return [
            '_id' => $this->fget(self::_ID_FIELD),
            'channel_id' => $this->fget(self::CHANNEL_ID_FIELD),
            'api_key' => $this->fget(self::API_KEY_FIELD),
        ];
    }
}
