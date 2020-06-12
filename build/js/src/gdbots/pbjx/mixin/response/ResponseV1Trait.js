import MessageRef from '@gdbots/pbj/well-known/MessageRef';

export default function ResponseV1Trait(M) {
  Object.assign(M.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), this.get(this.RESPONSE_ID_FIELD), tag);
    },
    
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        response_id: `${this.get(this.RESPONSE_ID_FIELD)}`,
        created_at: `${this.get(this.CREATED_AT_FIELD)}`,
        ctx_tenant_id: this.get(this.CTX_TENANT_ID_FIELD),
      };
    }
  });
}
