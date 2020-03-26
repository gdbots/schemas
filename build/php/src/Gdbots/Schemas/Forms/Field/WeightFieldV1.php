<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/weight-field/1-0-0.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1 as GdbotsFormsFieldV1;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Mixin as GdbotsFormsFieldV1Mixin;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Trait as GdbotsFormsFieldV1Trait;

final class WeightFieldV1 extends AbstractMessage implements
    WeightField,
    GdbotsFormsFieldV1
{
    use GdbotsFormsFieldV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:forms:field:weight-field:1-0-0', __CLASS__,
            [
                Fb::create('weight_units', T\StringType::create())
                    ->pattern('^(kilograms|pounds)$')
                    ->withDefault("pounds")
                    ->build(),
                /*
                 * The person's minimum physical weight recorded in pounds or kilograms.
                 */
                Fb::create('min_weight', T\SmallIntType::create())
                    ->build(),
                /*
                 * The person's maximum physical weight recorded in pounds or kilograms.
                 */
                Fb::create('max_weight', T\SmallIntType::create())
                    ->build(),
            ],
            [
                GdbotsFormsFieldV1Mixin::create(),
            ]
        );
    }
}
