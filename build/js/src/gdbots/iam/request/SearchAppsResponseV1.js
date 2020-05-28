// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/search-apps-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SearchAppsResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:request:search-apps-response:1-0-0', SearchAppsResponseV1,
      [
        Fb.create('nodes', T.MessageType.create())
          .asAList()
          .anyOfCuries([
            'gdbots:iam:mixin:app',
          ])
          .build(),
      ],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsNcrSearchNodesResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(SearchAppsResponseV1);
MessageResolver.register('gdbots:iam:request:search-apps-response', SearchAppsResponseV1);
Object.freeze(SearchAppsResponseV1);
Object.freeze(SearchAppsResponseV1.prototype);
