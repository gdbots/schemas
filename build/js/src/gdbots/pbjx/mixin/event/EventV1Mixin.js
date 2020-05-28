// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/event/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class EventV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:pbjx:mixin:event:1-0-2');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('event_id', T.TimeUuidType.create())
        .required()
        .build(),
      Fb.create('occurred_at', T.MicrotimeType.create())
        .build(),
      /*
       * Multi-tenant apps can use this field to track the tenant id.
       */
      Fb.create('ctx_tenant_id', T.StringType.create())
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create('ctx_causator_ref', T.MessageRefType.create())
        .build(),
      Fb.create('ctx_correlator_ref', T.MessageRefType.create())
        .build(),
      Fb.create('ctx_user_ref', T.MessageRefType.create())
        .build(),
      /*
       * The "ctx_app" refers to the application used to send the command which
       * in turn resulted in this event being published.
       */
      Fb.create('ctx_app', T.MessageType.create())
        .anyOfCuries([
          'gdbots:contexts::app',
        ])
        .build(),
      /*
       * The "ctx_cloud" is usually copied from the command that resulted in this
       * event being published. This means the value most likely refers to the cloud
       * that received the command originally, not the machine processing the event.
       */
      Fb.create('ctx_cloud', T.MessageType.create())
        .anyOfCuries([
          'gdbots:contexts::cloud',
        ])
        .build(),
      Fb.create('ctx_ip', T.StringType.create())
        .format(Format.IPV4)
        .overridable(true)
        .build(),
      Fb.create('ctx_ipv6', T.StringType.create())
        .format(Format.IPV6)
        .overridable(true)
        .build(),
      Fb.create('ctx_ua', T.TextType.create())
        .overridable(true)
        .build(),
      /*
       * An optional message/reason for the event being created.
       * Consider this like a git commit message.
       */
      Fb.create('ctx_msg', T.TextType.create())
        .build(),
    ];
  }
}
