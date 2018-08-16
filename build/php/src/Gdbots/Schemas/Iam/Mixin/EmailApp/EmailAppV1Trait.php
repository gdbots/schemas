<?php

namespace Gdbots\Schemas\Iam\Mixin\EmailApp;

use Gdbots\Pbj\Schema;

/**
 * @method static Schema schema
 * @method mixed get($fieldName, $default = null)
 */
trait EmailAppV1Trait
{
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            '_id' => (string)$this->get('_id'),
            'sendgrid_api_key' => (string)$this->get('sendgrid_api_key'),
        ];
    }
}
