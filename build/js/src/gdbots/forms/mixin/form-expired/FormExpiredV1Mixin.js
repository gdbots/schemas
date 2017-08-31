// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/form-expired/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class FormExpiredV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:form-expired:1-0-0');
  }
}