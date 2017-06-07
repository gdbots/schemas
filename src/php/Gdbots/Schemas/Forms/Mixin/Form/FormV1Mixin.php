<?php

namespace Gdbots\Schemas\Forms\Mixin\Form;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

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
                ->className('Gdbots\Schemas\Forms\Mixin\Field\Field')
                ->build(),
            Fb::create('hashtags', T\StringType::create())
                ->asASet()
                ->format(Format::HASHTAG())
                ->build()
        ];
    }
}
