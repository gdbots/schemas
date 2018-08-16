export default function EmailAppV1Trait(m) {
  Object.assign(m.prototype, {
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return {
        _id: `${this.get('_id', '')}`,
        sendgrid_api_key: `${this.get('sendgrid_api_key', '')}`,
      };
    }
  });
}
