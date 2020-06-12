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
        Fb.create(this.IS_ENABLED_FIELD, T.BooleanType.create())
          .build(),
        Fb.create(this.PROJECT_ID_FIELD, T.StringType.create())
          .pattern('^\\w+$')
          .build(),
        Fb.create(this.READ_KEY_FIELD, T.StringType.create())
          .pattern('^\\w+$')
          .build(),
        Fb.create(this.WRITE_KEY_FIELD, T.StringType.create())
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
    return new MessageRef(this.schema().getCurie(), this.get(this.PROJECT_ID_FIELD), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      project_id: this.get(this.PROJECT_ID_FIELD),
      read_key: this.get(this.READ_KEY_FIELD),
      write_key: this.get(this.WRITE_KEY_FIELD),
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

M.prototype.IS_ENABLED_FIELD = M.IS_ENABLED_FIELD = 'is_enabled';
M.prototype.PROJECT_ID_FIELD = M.PROJECT_ID_FIELD = 'project_id';
M.prototype.READ_KEY_FIELD = M.READ_KEY_FIELD = 'read_key';
M.prototype.WRITE_KEY_FIELD = M.WRITE_KEY_FIELD = 'write_key';

M.prototype.FIELDS = M.FIELDS = [
  M.IS_ENABLED_FIELD,
  M.PROJECT_ID_FIELD,
  M.READ_KEY_FIELD,
  M.WRITE_KEY_FIELD,
];

Object.freeze(M);
Object.freeze(M.prototype);
