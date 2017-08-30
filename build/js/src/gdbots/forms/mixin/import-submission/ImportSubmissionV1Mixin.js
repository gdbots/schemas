// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/import-submission/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class ImportSubmissionV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:import-submission:1-0-0');
  }
}
