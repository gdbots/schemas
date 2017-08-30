<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/unpublish-form/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\UnpublishForm;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class UnpublishFormV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:unpublish-form:1-0-0');
    }
}
