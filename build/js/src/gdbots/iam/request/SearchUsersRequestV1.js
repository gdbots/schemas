// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/search-users-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SearchUsersSort from '@gdbots/schemas/gdbots/iam/enums/SearchUsersSort';
import T from '@gdbots/pbj/types';

export default class SearchUsersRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:request:search-users-request:1-0-0', SearchUsersRequestV1,
      [
        Fb.create('sort', T.StringEnumType.create())
          .withDefault(SearchUsersSort.RELEVANCE)
          .classProto(SearchUsersSort)
          .build(),
        Fb.create('is_staff', T.TrinaryType.create())
          .build(),
        Fb.create('is_blocked', T.TrinaryType.create())
          .withDefault(2)
          .build(),
      ],
      [
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsNcrSearchNodesRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(SearchUsersRequestV1);
MessageResolver.register('gdbots:iam:request:search-users-request', SearchUsersRequestV1);
Object.freeze(SearchUsersRequestV1);
Object.freeze(SearchUsersRequestV1.prototype);
