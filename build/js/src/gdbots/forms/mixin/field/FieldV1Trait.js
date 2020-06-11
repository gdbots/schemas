import MessageRef from '@gdbots/pbj/well-known/MessageRef';

export default function FieldV1Trait(M) {
  Object.assign(M.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), this.get(this.NAME_FIELD), tag);
    },
    
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return { name: this.get(this.NAME_FIELD) };
    }
  });
}
