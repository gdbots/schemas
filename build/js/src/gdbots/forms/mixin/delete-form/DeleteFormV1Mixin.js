// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/delete-form/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class DeleteFormV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:delete-form:1-0-0');
  }
}
