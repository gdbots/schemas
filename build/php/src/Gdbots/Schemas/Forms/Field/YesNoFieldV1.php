<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/yes-no-field/1-0-1.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1 as GdbotsFormsFieldV1;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Mixin as GdbotsFormsFieldV1Mixin;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Trait as GdbotsFormsFieldV1Trait;

final class YesNoFieldV1 extends AbstractMessage implements
    YesNoField,
    GdbotsFormsFieldV1
{
    use GdbotsFormsFieldV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:forms:field:yes-no-field:1-0-1', __CLASS__,
            [
                Fb::create('yes_label', T\StringType::create())
                    ->build(),
                Fb::create('no_label', T\StringType::create())
                    ->build(),
                /*
                 * If this field relates to acquiring a user's consent,
                 * e.g. subscribing to a newsletter, then this field can
                 * be used to ensure that consent is tracked.
                 */
                Fb::create('is_consent', T\BooleanType::create())
                    ->build(),
            ],
            [
                GdbotsFormsFieldV1Mixin::create(),
            ]
        );
    }
}
