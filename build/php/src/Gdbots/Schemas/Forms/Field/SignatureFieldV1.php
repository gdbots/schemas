<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/signature-field/1-0-0.json#
namespace Gdbots\Schemas\Forms\Field;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Enum\PiiImpact;
use Gdbots\Schemas\Forms\Mixin\Field\FieldV1Mixin as GdbotsFormsFieldV1Mixin;

final class SignatureFieldV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:forms:field:signature-field:1-0-0';
    const SCHEMA_CURIE = 'gdbots:forms:field:signature-field';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:field:signature-field:v1';
    const MIXINS = [
      'gdbots:forms:mixin:field:v1',
      'gdbots:forms:mixin:field',
    ];

    use GdbotsFormsFieldV1Mixin;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                /*
                 * A unique identifier (within the form) for the field. This value
                 * is not shown to the user and should NOT change once set.
                 */
                Fb::create('name', T\StringType::create())
                    ->required()
                    ->maxLength(127)
                    ->pattern('^[a-zA-Z_]{1}[\w-]*$')
                    ->build(),
                /*
                 * The name of the schema field the answer will map to. By default this
                 * will go to the "cf" field which is a "dynamic-field" list containing
                 * all answers filled out on the form (ref "gdbots:forms:mixin:send-submission").
                 */
                Fb::create('maps_to', T\StringType::create())
                    ->maxLength(127)
                    ->pattern('^[a-zA-Z_]{1}\w*$')
                    ->withDefault("cf")
                    ->build(),
                /*
                 * The main text for the question/field.
                 */
                Fb::create('label', T\StringType::create())
                    ->build(),
                Fb::create('placeholder', T\StringType::create())
                    ->build(),
                /*
                 * A short description to better explain this field.
                 */
                Fb::create('description', T\TextType::create())
                    ->build(),
                Fb::create('is_required', T\BooleanType::create())
                    ->build(),
                /*
                 * The text that will replace the token "{link}" within the label or description.
                 */
                Fb::create('link_text', T\StringType::create())
                    ->build(),
                /*
                 * The URL to use for the replaced token "{link}" within the label or description.
                 */
                Fb::create('link_url', T\StringType::create())
                    ->format(Format::URL())
                    ->build(),
                Fb::create('pii_impact', T\StringEnumType::create())
                    ->className(PiiImpact::class)
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
