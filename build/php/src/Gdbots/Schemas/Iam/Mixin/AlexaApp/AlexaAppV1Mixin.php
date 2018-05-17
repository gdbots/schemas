<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/alexa-app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\AlexaApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class AlexaAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:alexa-app:1-0-0');
    }
}
