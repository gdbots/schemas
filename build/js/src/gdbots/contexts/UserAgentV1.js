// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/user-agent/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class UserAgentV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.BR_FAMILY_FIELD, T.StringType.create())
          .pattern('.+')
          .build(),
        Fb.create(this.BR_MAJOR_FIELD, T.SmallIntType.create())
          .build(),
        Fb.create(this.BR_MINOR_FIELD, T.SmallIntType.create())
          .build(),
        Fb.create(this.BR_PATCH_FIELD, T.SmallIntType.create())
          .build(),
        Fb.create(this.OS_FAMILY_FIELD, T.StringType.create())
          .pattern('.+')
          .build(),
        Fb.create(this.OS_MAJOR_FIELD, T.SmallIntType.create())
          .build(),
        Fb.create(this.OS_MINOR_FIELD, T.SmallIntType.create())
          .build(),
        Fb.create(this.OS_PATCH_FIELD, T.SmallIntType.create())
          .build(),
        Fb.create(this.OS_PATCH_MINOR_FIELD, T.SmallIntType.create())
          .build(),
        Fb.create(this.DVCE_FAMILY_FIELD, T.StringType.create())
          .pattern('.+')
          .build(),
      ],
      this.MIXINS,
    );
  }

  /**
   * @param {?string} tag
   * @returns {MessageRef}
   */
  generateMessageRef(tag = null) {
    return new MessageRef(this.schema().getCurie(), this.generateEtag(), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return { ua_hash: this.generateEtag() };
  }
}

const M = UserAgentV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:contexts::user-agent:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:contexts::user-agent';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:contexts::user-agent:v1';

M.prototype.MIXINS = M.MIXINS = [];

M.prototype.BR_FAMILY_FIELD = M.BR_FAMILY_FIELD = 'br_family';
M.prototype.BR_MAJOR_FIELD = M.BR_MAJOR_FIELD = 'br_major';
M.prototype.BR_MINOR_FIELD = M.BR_MINOR_FIELD = 'br_minor';
M.prototype.BR_PATCH_FIELD = M.BR_PATCH_FIELD = 'br_patch';
M.prototype.OS_FAMILY_FIELD = M.OS_FAMILY_FIELD = 'os_family';
M.prototype.OS_MAJOR_FIELD = M.OS_MAJOR_FIELD = 'os_major';
M.prototype.OS_MINOR_FIELD = M.OS_MINOR_FIELD = 'os_minor';
M.prototype.OS_PATCH_FIELD = M.OS_PATCH_FIELD = 'os_patch';
M.prototype.OS_PATCH_MINOR_FIELD = M.OS_PATCH_MINOR_FIELD = 'os_patch_minor';
M.prototype.DVCE_FAMILY_FIELD = M.DVCE_FAMILY_FIELD = 'dvce_family';

M.prototype.FIELDS = M.FIELDS = [
  M.BR_FAMILY_FIELD,
  M.BR_MAJOR_FIELD,
  M.BR_MINOR_FIELD,
  M.BR_PATCH_FIELD,
  M.OS_FAMILY_FIELD,
  M.OS_MAJOR_FIELD,
  M.OS_MINOR_FIELD,
  M.OS_PATCH_FIELD,
  M.OS_PATCH_MINOR_FIELD,
  M.DVCE_FAMILY_FIELD,
];

Object.freeze(M);
Object.freeze(M.prototype);
