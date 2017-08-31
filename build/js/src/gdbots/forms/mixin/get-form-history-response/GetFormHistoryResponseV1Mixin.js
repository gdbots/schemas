// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-form-history-response/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class GetFormHistoryResponseV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:get-form-history-response:1-0-0');
  }
}