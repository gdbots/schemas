<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/expire-form/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\ExpireForm;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class ExpireFormV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:expire-form:1-0-0');
    }
}
