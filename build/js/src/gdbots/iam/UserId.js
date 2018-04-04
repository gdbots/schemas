import UuidIdentifier from '@gdbots/pbj/well-known/UuidIdentifier';
import NodeRef from '../ncr/NodeRef';
import UserV1Mixin from './mixin/user/UserV1Mixin';

/** @type {SchemaQName} */
let qname;

export default class UserId extends UuidIdentifier {
  /**
   * @returns {NodeRef}
   */
  toNodeRef() {
    if (!qname) {
      qname = UserV1Mixin.findOne().getQName();
    }

    return new NodeRef(qname, this.value);
  }
}
