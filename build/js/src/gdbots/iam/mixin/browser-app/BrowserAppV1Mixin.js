// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/browser-app/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class BrowserAppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:browser-app:1-0-0');
  }
}
