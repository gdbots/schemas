<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/android-app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\AndroidApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class AndroidAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:android-app:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * An encrypted value of connection-string (starts with Endpoint=sb://) that can be obtained from Azure portal.
             * @link https://docs.microsoft.com/en-us/azure/notification-hubs/notification-hubs-nodejs-push-notification-tutorial
             */
            Fb::create('azure_notification_hub_connection', T\TextType::create())
                ->build(),
            Fb::create('azure_notification_hub_name', T\StringType::create())
                ->pattern('^[\w-]+$')
                ->build(),
        ];
    }
}
