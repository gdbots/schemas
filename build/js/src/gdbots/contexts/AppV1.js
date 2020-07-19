// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class AppV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create('_id', T.UuidType.create())
          .useTypeDefault(false)
          .build(),
        Fb.create('vendor', T.StringType.create())
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create('name', T.StringType.create())
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create('version', T.StringType.create())
          .maxLength(20)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create('build', T.StringType.create())
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create('variant', T.StringType.create())
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
    const id = this.get('_id') || this.generateEtag();
    return new MessageRef(this.schema().getCurie(), `${id}`, tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      _id: `${this.get('_id', '')}`,
      vendor: this.get('vendor'),
      name: this.get('name'),
      version: this.get('version'),
      build: this.get('build'),
      variant: this.get('variant'),
    };
  }
}

const M = AppV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:contexts::app:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:contexts::app';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:contexts::app:v1';
M.prototype.MIXINS = M.MIXINS = [];

Object.freeze(M);
Object.freeze(M.prototype);
