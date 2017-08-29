import MessageRef from '@gdbots/pbj/MessageRef';

export default function FieldV1Trait(m) {
  Object.assign(m.prototype, {
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
