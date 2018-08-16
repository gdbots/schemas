<?php

namespace Gdbots\Schemas\Iam\Mixin\AppleNewsApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait AppleNewsAppV1Trait
{
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            '_id' => (string)$this->get('_id'),
            'api_key' => (string)$this->get('api_key'),
            'api_secret' => (string)$this->get('api_secret'),
            'channel_id' => (string)$this->get('channel_id'),
        ];
    }
}
