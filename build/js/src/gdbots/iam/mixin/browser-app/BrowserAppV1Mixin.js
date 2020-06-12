// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/browser-app/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class BrowserAppV1Mixin {
  /**
   * @returns {SchemaId}
   */
  static getId() {
    return SchemaId.fromString(this.SCHEMA_ID);
  }

  /**
   * @param {string} name
   * @returns {boolean}
   */
  static hasField(name) {
    return this.FIELDS.includes(name);
  }

  /**
   * @returns {Field[]}
   */
  static getFields() {
    return [
      /*
       * An encrypted value of legacy-server-key that can be obtained from the cloud messaging tab of the Firebase
       * console.
       * @link https://firebase.google.com/docs/cloud-messaging/auth-server
       */
      Fb.create(this.FCM_API_KEY_FIELD, T.TextType.create())
        .build(),
      /*
       * A unique identifier used to identify an app within a Firebase project that can be obtained
       * from the Firebase console.
       * @link https://firebase.google.com/docs/web/setup?authuser=0#config-object
       */
      Fb.create(this.FCM_APP_ID_FIELD, T.StringType.create())
        .pattern('^[\\w:]+$')
        .build(),
      /*
       * A unique identifier for your Firebase project, used in requests to the FCM v1 HTTP endpoint.
       * @link https://firebase.google.com/docs/cloud-messaging/concept-options#projectid
       */
      Fb.create(this.FCM_PROJECT_ID_FIELD, T.StringType.create())
        .format(Format.SLUG)
        .build(),
      /*
       * A unique numerical value created when you create your Firebase project.
       * @link https://firebase.google.com/docs/cloud-messaging/concept-options#senderid
       */
      Fb.create(this.FCM_SENDER_ID_FIELD, T.StringType.create())
        .pattern('^\\d+$')
        .build(),
      /*
       * An un-encrypted key that can be obtained from the cloud messaging tab of the Firebase console.
       */
      Fb.create(this.FCM_WEB_API_KEY_FIELD, T.StringType.create())
        .pattern('^[\\w\\.-]+$')
        .build(),
    ];
  }
}

const M = BrowserAppV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:iam:mixin:browser-app:1-0-2';
M.SCHEMA_CURIE = 'gdbots:iam:mixin:browser-app';
M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:browser-app:v1';

M.FCM_API_KEY_FIELD = 'fcm_api_key';
M.FCM_APP_ID_FIELD = 'fcm_app_id';
M.FCM_PROJECT_ID_FIELD = 'fcm_project_id';
M.FCM_SENDER_ID_FIELD = 'fcm_sender_id';
M.FCM_WEB_API_KEY_FIELD = 'fcm_web_api_key';

M.FIELDS = [
  M.FCM_API_KEY_FIELD,
  M.FCM_APP_ID_FIELD,
  M.FCM_PROJECT_ID_FIELD,
  M.FCM_SENDER_ID_FIELD,
  M.FCM_WEB_API_KEY_FIELD,
];
