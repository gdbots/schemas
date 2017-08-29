<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/height-field/1-0-0.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1 as GdbotsFormsFieldV1;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Mixin as GdbotsFormsFieldV1Mixin;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Trait as GdbotsFormsFieldV1Trait;

final class HeightFieldV1 extends AbstractMessage implements
    HeightField,
    GdbotsFormsFieldV1
{
    use GdbotsFormsFieldV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:forms:field:height-field:1-0-0', __CLASS__,
            [
                /*
                 * The person's minimum physical height recorded in inches.
                 */
                Fb::create('min_height', T\TinyIntType::create())
                    ->build(),
                /*
                 * The person's maximum physical height recorded in inches.
                 */
                Fb::create('max_height', T\TinyIntType::create())
                    ->build(),
            ],
            [
                GdbotsFormsFieldV1Mixin::create(),
            ]
        );
    }
}
