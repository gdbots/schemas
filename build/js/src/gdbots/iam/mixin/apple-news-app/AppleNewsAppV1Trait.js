export default function AppleNewsAppV1Trait(M) {
  Object.assign(M.prototype, {
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        _id: `${this.get(this._ID_FIELD)}`,
        channel_id: this.get(this.CHANNEL_ID_FIELD),
        api_key: this.get(this.API_KEY_FIELD),
      };
    }
  });
}
