<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/form/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\Form;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Files\FileId;
use Gdbots\Schemas\Forms\Mixin\Field\Field as GdbotsFormsField;

final class FormV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:form:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * A short description (a few sentences) about this form. This field should
             * not have html as it is used in metadata.
             */
            Fb::create('description', T\TextType::create())
                ->build(),
            Fb::create('fields', T\MessageType::create())
                ->asAList()
                ->anyOfClassNames([
                    GdbotsFormsField::class,
                ])
                ->build(),
            Fb::create('hashtags', T\StringType::create())
                ->asASet()
                ->format(Format::HASHTAG())
                ->build(),
            Fb::create('disclaimer', T\TextType::create())
                ->build(),
            Fb::create('image', T\IdentifierType::create())
                ->className(FileId::class)
                ->build(),
        ];
    }
}
