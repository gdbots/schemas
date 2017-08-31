<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/form-published/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\FormPublished;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class FormPublishedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:form-published:1-0-0');
    }
}
