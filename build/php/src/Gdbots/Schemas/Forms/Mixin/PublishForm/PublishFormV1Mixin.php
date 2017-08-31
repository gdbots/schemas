<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/publish-form/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\PublishForm;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class PublishFormV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:publish-form:1-0-0');
    }
}
