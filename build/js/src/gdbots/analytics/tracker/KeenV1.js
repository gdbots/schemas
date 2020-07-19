// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/tracker/keen/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class KeenV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create('is_enabled', T.BooleanType.create())
          .build(),
        Fb.create('project_id', T.StringType.create())
          .pattern('^\\w+$')
          .build(),
        Fb.create('read_key', T.StringType.create())
          .pattern('^\\w+$')
          .build(),
        Fb.create('write_key', T.StringType.create())
          .pattern('^\\w+$')
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
    return new MessageRef(this.schema().getCurie(), this.get('project_id'), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      project_id: this.get('project_id'),
      read_key: this.get('read_key'),
      write_key: this.get('write_key'),
    };
  }
}

const M = KeenV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:analytics:tracker:keen:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:analytics:tracker:keen';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:analytics:tracker:keen:v1';
M.prototype.MIXINS = M.MIXINS = [
  'gdbots:analytics:mixin:tracker:v1',
  'gdbots:analytics:mixin:tracker',
];

Object.freeze(M);
Object.freeze(M.prototype);
