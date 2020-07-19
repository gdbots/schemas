// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/cloud/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class CloudV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create('provider', T.StringType.create())
          .maxLength(20)
          .format(Format.SLUG)
          .build(),
        Fb.create('region', T.StringType.create())
          .maxLength(20)
          .format(Format.SLUG)
          .build(),
        Fb.create('zone', T.StringType.create())
          .maxLength(20)
          .format(Format.SLUG)
          .build(),
        Fb.create('instance_id', T.StringType.create())
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create('instance_type', T.StringType.create())
          .maxLength(20)
          .pattern('^[\\w\\.-]+$')
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
    return {
      provider: this.get('provider'),
      region: this.get('region'),
      zone: this.get('zone'),
      instance_id: this.get('instance_id'),
      instance_type: this.get('instance_type'),
    };
  }
}

const M = CloudV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:contexts::cloud:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:contexts::cloud';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:contexts::cloud:v1';
M.prototype.MIXINS = M.MIXINS = [];

Object.freeze(M);
Object.freeze(M.prototype);
