import MessageRef from '@gdbots/pbj/well-known/MessageRef';

export default function NodeV1Trait(M) {
  Object.assign(M.prototype, {
    /**
     * @param {?string} tag
     * @returns {MessageRef}
     */
    generateMessageRef(tag = null) {
      return new MessageRef(this.schema().getCurie(), this.get(this._ID_FIELD), tag);
    }
  });
}
