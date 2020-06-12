<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/weight-field/1-0-0.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Enum\PiiImpact;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Trait as GdbotsFormsFieldV1Trait;

final class WeightFieldV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:forms:field:weight-field:1-0-0';
    const SCHEMA_CURIE = 'gdbots:forms:field:weight-field';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:field:weight-field:v1';

    const MIXINS = [
      'gdbots:forms:mixin:field:v1',
      'gdbots:forms:mixin:field',
    ];

    const NAME_FIELD = 'name';
    const MAPS_TO_FIELD = 'maps_to';
    const LABEL_FIELD = 'label';
    const PLACEHOLDER_FIELD = 'placeholder';
    const DESCRIPTION_FIELD = 'description';
    const IS_REQUIRED_FIELD = 'is_required';
    const LINK_TEXT_FIELD = 'link_text';
    const LINK_URL_FIELD = 'link_url';
    const PII_IMPACT_FIELD = 'pii_impact';
    const WEIGHT_UNITS_FIELD = 'weight_units';
    const MIN_WEIGHT_FIELD = 'min_weight';
    const MAX_WEIGHT_FIELD = 'max_weight';

    const FIELDS = [
      self::NAME_FIELD,
      self::MAPS_TO_FIELD,
      self::LABEL_FIELD,
      self::PLACEHOLDER_FIELD,
      self::DESCRIPTION_FIELD,
      self::IS_REQUIRED_FIELD,
      self::LINK_TEXT_FIELD,
      self::LINK_URL_FIELD,
      self::PII_IMPACT_FIELD,
      self::WEIGHT_UNITS_FIELD,
      self::MIN_WEIGHT_FIELD,
      self::MAX_WEIGHT_FIELD,
    ];

    use GdbotsFormsFieldV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                /*
                 * A unique identifier (within the form) for the field. This value
                 * is not shown to the user and should NOT change once set.
                 */
                Fb::create(self::NAME_FIELD, T\StringType::create())
                    ->required()
                    ->maxLength(127)
                    ->pattern('^[a-zA-Z_]{1}[\w-]*$')
                    ->build(),
                /*
                 * The name of the schema field the answer will map to. By default this
                 * will go to the "cf" field which is a "dynamic-field" list containing
                 * all answers filled out on the form (ref "gdbots:forms:mixin:send-submission").
                 */
                Fb::create(self::MAPS_TO_FIELD, T\StringType::create())
                    ->maxLength(127)
                    ->pattern('^[a-zA-Z_]{1}\w*$')
                    ->withDefault("cf")
                    ->build(),
                /*
                 * The main text for the question/field.
                 */
                Fb::create(self::LABEL_FIELD, T\StringType::create())
                    ->build(),
                Fb::create(self::PLACEHOLDER_FIELD, T\StringType::create())
                    ->build(),
                /*
                 * A short description to better explain this field.
                 */
                Fb::create(self::DESCRIPTION_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::IS_REQUIRED_FIELD, T\BooleanType::create())
                    ->build(),
                /*
                 * The text that will replace the token "{link}" within the label or description.
                 */
                Fb::create(self::LINK_TEXT_FIELD, T\StringType::create())
                    ->build(),
                /*
                 * The URL to use for the replaced token "{link}" within the label or description.
                 */
                Fb::create(self::LINK_URL_FIELD, T\StringType::create())
                    ->format(Format::URL())
                    ->build(),
                Fb::create(self::PII_IMPACT_FIELD, T\StringEnumType::create())
                    ->className(PiiImpact::class)
                    ->build(),
                Fb::create(self::WEIGHT_UNITS_FIELD, T\StringType::create())
                    ->pattern('^(kilograms|pounds)$')
                    ->withDefault("pounds")
                    ->build(),
                /*
                 * The person's minimum physical weight recorded in pounds or kilograms.
                 */
                Fb::create(self::MIN_WEIGHT_FIELD, T\SmallIntType::create())
                    ->build(),
                /*
                 * The person's maximum physical weight recorded in pounds or kilograms.
                 */
                Fb::create(self::MAX_WEIGHT_FIELD, T\SmallIntType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
