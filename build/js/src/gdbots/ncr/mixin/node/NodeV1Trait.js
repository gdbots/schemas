import MessageRef from '@gdbots/pbj/MessageRef';

export default function NodeV1Trait(m) {
  Object.assign(m.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), this.get('_id'), tag);
    }
  });
}
