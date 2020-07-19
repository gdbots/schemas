export default function RoleV1Mixin(M) {
  Object.assign(M.prototype, {
    /**
     * @returns {Object}
     */
    getUriTemplateVars() {
      return { _id: `${this.get('_id')}` };
    }
  });
}
