export default function AppleNewsAppV1Trait(m) {
  Object.assign(m.prototype, {
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        _id: `${this.get('_id', '')}`,
        api_key: `${this.get('api_key', '')}`,
        api_secret: `${this.get('api_secret', '')}`,
        channel_id: `${this.get('channel_id', '')}`,
      };
    }
  });
}
