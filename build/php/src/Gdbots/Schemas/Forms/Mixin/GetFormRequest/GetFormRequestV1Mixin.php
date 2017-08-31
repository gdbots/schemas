<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-form-request/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\GetFormRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class GetFormRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:get-form-request:1-0-0');
    }
}
