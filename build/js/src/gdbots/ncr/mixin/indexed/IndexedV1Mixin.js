// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/indexed/1-0-0.json#
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';

export default class IndexedV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:indexed:1-0-0');
  }
}
