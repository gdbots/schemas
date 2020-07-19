import MessageRef from '@gdbots/pbj/well-known/MessageRef';

export default function CommandV1Mixin(M) {
  Object.assign(M.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), this.get('command_id'), tag);
    },
    
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        command_id: `${this.get('command_id')}`,
        occurred_at: `${this.get('occurred_at')}`,
        ctx_tenant_id: this.get('ctx_tenant_id'),
        ctx_user_ref: `${this.get('ctx_user_ref', '')}`,
      };
    }
  });
}
