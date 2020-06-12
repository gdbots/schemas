export default function SlackAppV1Trait(M) {
  Object.assign(M.prototype, {
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        _id: `${this.get(this._ID_FIELD)}`,
      };
    }
  });
}
