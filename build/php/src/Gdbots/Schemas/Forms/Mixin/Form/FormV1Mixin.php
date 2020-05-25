<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/form/1-0-3.json#
namespace Gdbots\Schemas\Forms\Mixin\Form;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Files\FileId;
use Gdbots\Schemas\Forms\Enum\PiiImpact;

final class FormV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:forms:mixin:form:1-0-3';
    const SCHEMA_CURIE = 'gdbots:forms:mixin:form';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:form:v1';

    const DESCRIPTION_FIELD = 'description';
    const THANK_YOU_HEADER_FIELD = 'thank_you_header';
    const THANK_YOU_TEXT_FIELD = 'thank_you_text';
    const THANK_YOU_URL_FIELD = 'thank_you_url';
    const TEMPLATE_FIELD = 'template';
    const CUSTOM_CODE_FIELD = 'custom_code';
    const FIELDS_FIELD = 'fields';
    const HASHTAGS_FIELD = 'hashtags';
    const DISCLAIMER_FIELD = 'disclaimer';
    const IMAGE_ID_FIELD = 'image_id';
    const PII_IMPACT_FIELD = 'pii_impact';

    const FIELDS = [
      self::DESCRIPTION_FIELD,
      self::THANK_YOU_HEADER_FIELD,
      self::THANK_YOU_TEXT_FIELD,
      self::THANK_YOU_URL_FIELD,
      self::TEMPLATE_FIELD,
      self::CUSTOM_CODE_FIELD,
      self::FIELDS_FIELD,
      self::HASHTAGS_FIELD,
      self::DISCLAIMER_FIELD,
      self::IMAGE_ID_FIELD,
      self::PII_IMPACT_FIELD,
    ];

    final private function __construct() {}

    public static function getId(): SchemaId
    {
        return SchemaId::fromString(self::SCHEMA_ID);
    }

    public static function hasField(string $name): bool
    {
        return in_array($name, self::FIELDS, true);
    }

    /**
     * @return Field[]
     */
    public static function getFields(): array
    {
        return [
            /*
             * A short description (a few sentences) about this form. This field should
             * not have html as it is used in metadata.
             */
            Fb::create(self::DESCRIPTION_FIELD, T\TextType::create())
                ->build(),
            Fb::create(self::THANK_YOU_HEADER_FIELD, T\StringType::create())
                ->build(),
            /*
             * A short thank you message (a few sentences) a user will see after
             * they submit this form. This field should have little to no html
             * as it can be used in various contexts.
             */
            Fb::create(self::THANK_YOU_TEXT_FIELD, T\TextType::create())
                ->build(),
            Fb::create(self::THANK_YOU_URL_FIELD, T\StringType::create())
                ->format(Format::URL())
                ->build(),
            Fb::create(self::TEMPLATE_FIELD, T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
            /*
             * A map containing (HTML, JavaScript, CSS, etc.) that is injected into
             * a template at a named insertion point, e.g. "html_head" or "footer".
             */
            Fb::create(self::CUSTOM_CODE_FIELD, T\TextType::create())
                ->asAMap()
                ->build(),
            Fb::create(self::FIELDS_FIELD, T\MessageType::create())
                ->asAList()
                ->anyOfCuries([
                    'gdbots:forms:mixin:field',
                ])
                ->build(),
            Fb::create(self::HASHTAGS_FIELD, T\StringType::create())
                ->asASet()
                ->format(Format::HASHTAG())
                ->build(),
            Fb::create(self::DISCLAIMER_FIELD, T\TextType::create())
                ->build(),
            Fb::create(self::IMAGE_ID_FIELD, T\IdentifierType::create())
                ->className(FileId::class)
                ->build(),
            Fb::create(self::PII_IMPACT_FIELD, T\StringEnumType::create())
                ->className(PiiImpact::class)
                ->build(),
        ];
    }
}
