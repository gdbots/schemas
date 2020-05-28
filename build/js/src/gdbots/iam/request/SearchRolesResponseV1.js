// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/search-roles-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SearchRolesResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:request:search-roles-response:1-0-0', SearchRolesResponseV1,
      [
        Fb.create('nodes', T.MessageType.create())
          .asAList()
          .anyOfCuries([
            'gdbots:iam:mixin:role',
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

GdbotsPbjxResponseV1Trait(SearchRolesResponseV1);
MessageResolver.register('gdbots:iam:request:search-roles-response', SearchRolesResponseV1);
Object.freeze(SearchRolesResponseV1);
Object.freeze(SearchRolesResponseV1.prototype);
