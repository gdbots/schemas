<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/delete-form/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\DeleteForm;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class DeleteFormV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:delete-form:1-0-0');
    }
}
