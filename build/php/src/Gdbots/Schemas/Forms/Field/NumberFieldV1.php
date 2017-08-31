<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/number-field/1-0-0.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1 as GdbotsFormsFieldV1;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Mixin as GdbotsFormsFieldV1Mixin;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Trait as GdbotsFormsFieldV1Trait;

final class NumberFieldV1 extends AbstractMessage implements
    NumberField,
    GdbotsFormsFieldV1
{
    use GdbotsFormsFieldV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:forms:field:number-field:1-0-0', __CLASS__,
            [
                Fb::create('min_value', T\IntType::create())
                    ->build(),
                Fb::create('max_value', T\IntType::create())
                    ->build(),
                /*
                 * Number of decimal places to allow. A "0" denotes this number field
                 * will require an integer.
                 */
                Fb::create('decimals', T\TinyIntType::create())
                    ->max(6)
                    ->build(),
            ],
            [
                GdbotsFormsFieldV1Mixin::create(),
            ]
        );
    }
}
