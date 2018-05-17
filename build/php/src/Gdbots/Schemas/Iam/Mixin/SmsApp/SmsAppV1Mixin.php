<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/sms-app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\SmsApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class SmsAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:sms-app:1-0-0');
    }
}
