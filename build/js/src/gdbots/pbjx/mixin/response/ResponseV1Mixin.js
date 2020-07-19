import MessageRef from '@gdbots/pbj/well-known/MessageRef';

export default function ResponseV1Mixin(M) {
  Object.assign(M.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), this.get('response_id'), tag);
    },
    
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        response_id: `${this.get('response_id')}`,
        created_at: `${this.get('created_at')}`,
        ctx_tenant_id: this.get('ctx_tenant_id'),
      };
    }
  });
}
