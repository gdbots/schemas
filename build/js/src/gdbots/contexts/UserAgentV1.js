// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/user-agent/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/MessageRef';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class UserAgentV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:contexts::user-agent:1-0-0', UserAgentV1,
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

MessageResolver.register('gdbots:contexts::user-agent', UserAgentV1);
Object.freeze(UserAgentV1);
Object.freeze(UserAgentV1.prototype);
