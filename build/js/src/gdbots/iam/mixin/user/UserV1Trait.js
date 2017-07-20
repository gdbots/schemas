export default function UserV1Trait(m) {
  Object.assign(m.prototype, {
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return { user_id: `${this.get('_id', '')}` };
    }
  });
}
