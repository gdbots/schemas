<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/form-expired/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\FormExpired;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class FormExpiredV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:form-expired:1-0-0');
    }
}
