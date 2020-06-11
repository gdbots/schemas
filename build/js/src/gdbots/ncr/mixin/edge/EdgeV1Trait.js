import EdgeId from '@gdbots/schemas/gdbots/ncr/EdgeId';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';

export default function EdgeV1Trait(M) {
  Object.assign(M.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), EdgeId.fromEdge(this), tag);
    },
    
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        edge_id: `${EdgeId.fromEdge(this)}`,
        from_ref: `${this.get(this.FROM_REF_FIELD)}`,
        to_ref: `${this.get(this.TO_REF_FIELD)}`,
        created_at: `${this.get(this.CREATED_AT_FIELD)}`,
      };
    }
  });
}
