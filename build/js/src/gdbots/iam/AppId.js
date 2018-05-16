import UuidIdentifier from '@gdbots/pbj/well-known/UuidIdentifier';
import NodeRef from '../ncr/NodeRef';
import AppV1Mixin from './mixin/app/AppV1Mixin';

/** @type {SchemaQName} */
let qname;

export default class AppId extends UuidIdentifier {
  /**
   * @returns {NodeRef}
   */
  toNodeRef() {
    if (!qname) {
      qname = AppV1Mixin.findOne().getQName();
    }

    return new NodeRef(qname, this.value);
  }
}
