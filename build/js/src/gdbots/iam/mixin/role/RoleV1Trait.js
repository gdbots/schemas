export default function RoleV1Trait(m) {
  Object.assign(m.prototype, {
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return { role_id: `${this.get('_id', '')}` };
    }
  });
}
