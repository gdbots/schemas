import EdgeId from '@gdbots/schemas/gdbots/ncr/EdgeId';
import MessageRef from '@gdbots/pbj/MessageRef';

export default function EdgeV1Trait(m) {
  Object.assign(m.prototype, {
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
        from_ref: `${this.get('from_ref')}`,
        to_ref: `${this.get('to_ref')}`,
        created_at: `${this.get('created_at')}`,
      };
    }
  });
}
