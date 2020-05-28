// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/search-roles-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SearchRolesSort from '@gdbots/schemas/gdbots/iam/enums/SearchRolesSort';
import T from '@gdbots/pbj/types';

export default class SearchRolesRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:request:search-roles-request:1-0-0', SearchRolesRequestV1,
      [
        Fb.create('sort', T.StringEnumType.create())
          .withDefault(SearchRolesSort.TITLE_ASC)
          .classProto(SearchRolesSort)
          .build(),
      ],
      [
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsNcrSearchNodesRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(SearchRolesRequestV1);
MessageResolver.register('gdbots:iam:request:search-roles-request', SearchRolesRequestV1);
Object.freeze(SearchRolesRequestV1);
Object.freeze(SearchRolesRequestV1.prototype);
