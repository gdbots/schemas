// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/tracker/keen/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsAnalyticsTrackerV1Mixin from '@gdbots/schemas/gdbots/analytics/mixin/tracker/TrackerV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/MessageRef';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class KeenV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:analytics:tracker:keen:1-0-0', KeenV1,
      [
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
      [
        GdbotsAnalyticsTrackerV1Mixin.create(),
      ],
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

MessageResolver.register('gdbots:analytics:tracker:keen', KeenV1);
Object.freeze(KeenV1);
Object.freeze(KeenV1.prototype);
