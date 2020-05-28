// @link http://schemas.gdbots.io/json-schema/gdbots/iam/event/app-roles-granted/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class AppRolesGrantedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:iam:event:app-roles-granted:1-0-0', AppRolesGrantedV1,
      [
        Fb.create('node_ref', T.NodeRefType.create())
          .required()
          .build(),
        /*
         * The roles granted to the app.
         */
        Fb.create('roles', T.NodeRefType.create())
          .asASet()
          .build(),
      ],
      [
        GdbotsPbjxEventV1Mixin.create(),
        GdbotsAnalyticsTrackedMessageV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
        GdbotsEnrichmentsIpToGeoV1Mixin.create(),
        GdbotsEnrichmentsTimePartingV1Mixin.create(),
        GdbotsEnrichmentsTimeSamplingV1Mixin.create(),
        GdbotsEnrichmentsUaParserV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(AppRolesGrantedV1);
MessageResolver.register('gdbots:iam:event:app-roles-granted', AppRolesGrantedV1);
Object.freeze(AppRolesGrantedV1);
Object.freeze(AppRolesGrantedV1.prototype);
