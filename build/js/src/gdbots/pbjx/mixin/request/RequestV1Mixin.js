// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/request/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class RequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:pbjx:mixin:request:1-0-2');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('request_id', T.UuidType.create())
        .required()
        .build(),
      Fb.create('occurred_at', T.MicrotimeType.create())
        .build(),
      /*
       * The "ctx_retries" field is used to keep track of how many attempts were
       * made to handle this request. In some cases, the service or transport
       * that handles the request may be down or over capacity and is being retried.
       */
      Fb.create('ctx_retries', T.TinyIntType.create())
        .build(),
      Fb.create('ctx_causator_ref', T.MessageRefType.create())
        .build(),
      Fb.create('ctx_correlator_ref', T.MessageRefType.create())
        .build(),
      Fb.create('ctx_user_ref', T.MessageRefType.create())
        .build(),
      /*
       * The "ctx_app" refers to the application used to make the request. This is
       * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
       * is not necessarily the app used (cms, iOS app, website)
       */
      Fb.create('ctx_app', T.MessageType.create())
        .anyOfCuries([
          'gdbots:contexts::app',
        ])
        .build(),
      /*
       * The "ctx_cloud" is set by the server making the request and is generally
       * only used internally for tracking and performance monitoring.
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
       * Field names to dereference, this serves as a hint to the server and is not
       * necessarily gauranteed since authorization, availability, etc. are determined
       * by the server not the client.
       */
      Fb.create('derefs', T.StringType.create())
        .asASet()
        .pattern('^[\\w\\.-]+$')
        .build(),
    ];
  }
}
