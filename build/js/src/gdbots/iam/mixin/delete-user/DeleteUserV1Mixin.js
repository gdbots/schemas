// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/delete-user/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class DeleteUserV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:delete-user:1-0-0');
  }
}