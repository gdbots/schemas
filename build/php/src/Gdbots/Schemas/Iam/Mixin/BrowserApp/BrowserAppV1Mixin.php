<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/browser-app/1-0-1.json#
namespace Gdbots\Schemas\Iam\Mixin\BrowserApp;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class BrowserAppV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:browser-app:1-0-1';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:browser-app';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:browser-app:v1';

    const FCM_API_KEY_FIELD = 'fcm_api_key';
    const FCM_PROJECT_ID_FIELD = 'fcm_project_id';
    const FCM_SENDER_ID_FIELD = 'fcm_sender_id';
    const FCM_WEB_API_KEY_FIELD = 'fcm_web_api_key';

    const FIELDS = [
      self::FCM_API_KEY_FIELD,
      self::FCM_PROJECT_ID_FIELD,
      self::FCM_SENDER_ID_FIELD,
      self::FCM_WEB_API_KEY_FIELD,
    ];

    final private function __construct() {}

    public static function getId(): SchemaId
    {
        return SchemaId::fromString(self::SCHEMA_ID);
    }

    public static function hasField(string $name): bool
    {
        return in_array($name, self::FIELDS, true);
    }

    /**
     * @return Field[]
     */
    public static function getFields(): array
    {
        return [
            /*
             * An encrypted value of legacy-server-key that can be obtained from the cloud messaging tab of the Firebase
             * console.
             * @link https://firebase.google.com/docs/cloud-messaging/auth-server
             */
            Fb::create(self::FCM_API_KEY_FIELD, T\TextType::create())
                ->build(),
            /*
             * A unique identifier for your Firebase project, used in requests to the FCM v1 HTTP endpoint.
             * @link https://firebase.google.com/docs/cloud-messaging/concept-options#projectid
             */
            Fb::create(self::FCM_PROJECT_ID_FIELD, T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
            /*
             * A unique numerical value created when you create your Firebase project.
             * @link https://firebase.google.com/docs/cloud-messaging/concept-options#senderid
             */
            Fb::create(self::FCM_SENDER_ID_FIELD, T\StringType::create())
                ->pattern('^\d+$')
                ->build(),
            /*
             * An un-encrypted key that can be obtained from the cloud messaging tab of the Firebase console.
             */
            Fb::create(self::FCM_WEB_API_KEY_FIELD, T\StringType::create())
                ->pattern('^[\w\.-]+$')
                ->build(),
        ];
    }
}
