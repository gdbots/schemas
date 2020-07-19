<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/field/1-0-2.json#
namespace Gdbots\Schemas\Forms\Mixin\Field;

use Gdbots\Pbj\Schema;
use Gdbots\Pbj\WellKnown\MessageRef;

/**
 * @method static Schema schema
 * @method mixed fget($fieldName, $default = null)
 */
trait FieldV1Mixin
{
    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget('name'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return ['name' => $this->fget('name')];
    }
}
