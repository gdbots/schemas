<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/browser-app/1-0-1.json#
namespace Gdbots\Schemas\Iam\Mixin\BrowserApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class BrowserAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:browser-app:1-0-1');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * An encrypted value of legacy-server-key that can be obtained from the cloud messaging tab of the Firebase console.
             * @link https://firebase.google.com/docs/cloud-messaging/auth-server
             */
            Fb::create('fcm_api_key', T\TextType::create())
                ->build(),
            /*
             * A unique identifier for your Firebase project, used in requests to the FCM v1 HTTP endpoint.
             * @link https://firebase.google.com/docs/cloud-messaging/concept-options#projectid
             */
            Fb::create('fcm_project_id', T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
            /*
             * A unique numerical value created when you create your Firebase project.
             * @link https://firebase.google.com/docs/cloud-messaging/concept-options#senderid
             */
            Fb::create('fcm_sender_id', T\StringType::create())
                ->pattern('^\d+$')
                ->build(),
            /*
             * An un-encrypted key that can be obtained from the cloud messaging tab of the Firebase console.
             */
            Fb::create('fcm_web_api_key', T\StringType::create())
                ->pattern('^[\w\.-]+$')
                ->build(),
        ];
    }
}
