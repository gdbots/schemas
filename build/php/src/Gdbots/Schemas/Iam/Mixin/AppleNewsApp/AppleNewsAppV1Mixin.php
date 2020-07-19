<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/apple-news-app/1-0-1.json#
namespace Gdbots\Schemas\Iam\Mixin\AppleNewsApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait AppleNewsAppV1Mixin
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
