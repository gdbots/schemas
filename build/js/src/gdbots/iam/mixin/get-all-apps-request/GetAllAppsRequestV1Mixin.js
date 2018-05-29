// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/get-all-apps-request/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class GetAllAppsRequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:get-all-apps-request:1-0-0');
  }
}
