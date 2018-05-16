<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/android-app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\AndroidApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class AndroidAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:android-app:1-0-0');
    }
}
