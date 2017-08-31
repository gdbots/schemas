<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-forms-response/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\SearchFormsResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Mixin\Form\Form as GdbotsFormsForm;

final class SearchFormsResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:search-forms-response:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('nodes', T\MessageType::create())
                ->asAList()
                ->anyOfClassNames([
                    GdbotsFormsForm::class,
                ])
                ->build(),
        ];
    }
}
