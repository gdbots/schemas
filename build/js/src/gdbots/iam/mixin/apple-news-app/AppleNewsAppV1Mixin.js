export default function AppleNewsAppV1Mixin(M) {
  Object.assign(M.prototype, {
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        _id: `${this.get('_id')}`,
        channel_id: this.get('channel_id'),
        api_key: this.get('api_key'),
      };
    }
  });
}
