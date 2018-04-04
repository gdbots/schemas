import SlugIdentifier from '@gdbots/pbj/well-known/SlugIdentifier';
import NodeRef from '../ncr/NodeRef';
import RoleV1Mixin from './mixin/role/RoleV1Mixin';

/** @type {SchemaQName} */
let qname;

/**
 * A role id is just a friendly slug identifer.
 * e.g. "super-user", "publisher", "ring-bearer"
 */
export default class RoleId extends SlugIdentifier {
  /**
   * @returns {NodeRef}
   */
  toNodeRef() {
    if (!qname) {
      qname = RoleV1Mixin.findOne().getQName();
    }

    return new NodeRef(qname, this.value);
  }
}
