// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-submission-history-request/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class GetSubmissionHistoryRequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:get-submission-history-request:1-0-0');
  }
}
