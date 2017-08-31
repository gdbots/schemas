<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-forms-request/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\SearchFormsRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Enum\SearchFormsSort;

final class SearchFormsRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:search-forms-request:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('sort', T\StringEnumType::create())
                ->withDefault(SearchFormsSort::RELEVANCE())
                ->className(SearchFormsSort::class)
                ->build(),
        ];
    }
}
