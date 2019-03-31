// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/android-app/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AndroidAppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:android-app:1-0-1');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * An encrypted value of connection-string (starts with Endpoint=sb://) that can be obtained from Azure portal.
       * @link https://docs.microsoft.com/en-us/azure/notification-hubs/notification-hubs-nodejs-push-notification-tutorial
       */
      Fb.create('azure_notification_hub_connection', T.TextType.create())
        .build(),
      Fb.create('azure_notification_hub_name', T.StringType.create())
        .pattern('^[\\w\\.-]+$')
        .build(),
    ];
  }
}
