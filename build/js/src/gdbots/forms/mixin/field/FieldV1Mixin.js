import MessageRef from '@gdbots/pbj/well-known/MessageRef.js';

export default function FieldV1Mixin(M) {
  Object.assign(M.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), this.get('name'), tag);
    },
    
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return { name: this.get('name') };
    }
  });
}
