export default function SmsAppV1Trait(M) {
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
