// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/search-apps-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SearchAppsSort from '@gdbots/schemas/gdbots/iam/enums/SearchAppsSort';
import T from '@gdbots/pbj/types';

export default class SearchAppsRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:request:search-apps-request:1-0-0', SearchAppsRequestV1,
      [
        Fb.create('sort', T.StringEnumType.create())
          .withDefault(SearchAppsSort.TITLE_ASC)
          .classProto(SearchAppsSort)
          .build(),
      ],
      [
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsNcrSearchNodesRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(SearchAppsRequestV1);
MessageResolver.register('gdbots:iam:request:search-apps-request', SearchAppsRequestV1);
Object.freeze(SearchAppsRequestV1);
Object.freeze(SearchAppsRequestV1.prototype);
