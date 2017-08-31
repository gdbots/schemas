<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/snapchat-user-field/1-0-0.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1 as GdbotsFormsFieldV1;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Mixin as GdbotsFormsFieldV1Mixin;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Trait as GdbotsFormsFieldV1Trait;

final class SnapchatUserFieldV1 extends AbstractMessage implements
    SnapchatUserField,
    GdbotsFormsFieldV1
{
    use GdbotsFormsFieldV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:forms:field:snapchat-user-field:1-0-0', __CLASS__,
            [],
            [
                GdbotsFormsFieldV1Mixin::create(),
            ]
        );
    }
}
