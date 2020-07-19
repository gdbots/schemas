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
        Fb.create('br_family', T.StringType.create())
          .pattern('.+')
          .build(),
        Fb.create('br_major', T.SmallIntType.create())
          .build(),
        Fb.create('br_minor', T.SmallIntType.create())
          .build(),
        Fb.create('br_patch', T.SmallIntType.create())
          .build(),
        Fb.create('os_family', T.StringType.create())
          .pattern('.+')
          .build(),
        Fb.create('os_major', T.SmallIntType.create())
          .build(),
        Fb.create('os_minor', T.SmallIntType.create())
          .build(),
        Fb.create('os_patch', T.SmallIntType.create())
          .build(),
        Fb.create('os_patch_minor', T.SmallIntType.create())
          .build(),
        Fb.create('dvce_family', T.StringType.create())
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

Object.freeze(M);
Object.freeze(M.prototype);
