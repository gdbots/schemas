import MessageRef from '@gdbots/pbj/well-known/MessageRef';

export default function EventV1Trait(M) {
  Object.assign(M.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), this.get(this.EVENT_ID_FIELD), tag);
    },
    
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        event_id: `${this.get(this.EVENT_ID_FIELD)}`,
        occurred_at: `${this.get(this.OCCURRED_AT_FIELD)}`,
        ctx_tenant_id: this.get(this.CTX_TENANT_ID_FIELD),
        ctx_user_ref: `${this.get(this.CTX_USER_REF_FIELD, '')}`,
      };
    }
  });
}
