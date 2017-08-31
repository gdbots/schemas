// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/form-scheduled/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class FormScheduledV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:form-scheduled:1-0-0');
  }
}
