<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/select-field/1-0-1.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1 as GdbotsFormsFieldV1;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Mixin as GdbotsFormsFieldV1Mixin;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Trait as GdbotsFormsFieldV1Trait;

final class SelectFieldV1 extends AbstractMessage implements
    SelectField,
    GdbotsFormsFieldV1
{
    use GdbotsFormsFieldV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:forms:field:select-field:1-0-1', __CLASS__,
            [
                Fb::create('option_labels', T\StringType::create())
                    ->asAList()
                    ->build(),
                Fb::create('option_values', T\StringType::create())
                    ->asAList()
                    ->build(),
                Fb::create('allow_other', T\BooleanType::create())
                    ->build(),
            ],
            [
                GdbotsFormsFieldV1Mixin::create(),
            ]
        );
    }
}
