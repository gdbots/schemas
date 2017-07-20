<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/country-field/1-0-0.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1 as GdbotsFormsFieldV1;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Mixin as GdbotsFormsFieldV1Mixin;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Trait as GdbotsFormsFieldV1Trait;

final class CountryFieldV1 extends AbstractMessage implements
    CountryField,
    GdbotsFormsFieldV1
{
    use GdbotsFormsFieldV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:forms:field:country-field:1-0-0', __CLASS__,
            [
                Fb::create('default_country', T\StringType::create())
                    ->pattern('^[A-Z]{2}$')
                    ->build(),
                Fb::create('preferred_countries', T\StringType::create())
                    ->asASet()
                    ->pattern('^[A-Z]{2}$')
                    ->build(),
                Fb::create('included_countries', T\StringType::create())
                    ->asASet()
                    ->pattern('^[A-Z]{2}$')
                    ->build(),
                Fb::create('excluded_countries', T\StringType::create())
                    ->asASet()
                    ->pattern('^[A-Z]{2}$')
                    ->build(),
            ],
            [
                GdbotsFormsFieldV1Mixin::create(),
            ]
        );
    }
}
