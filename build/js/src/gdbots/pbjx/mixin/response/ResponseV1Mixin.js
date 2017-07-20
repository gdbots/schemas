// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class ResponseV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:pbjx:mixin:response:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('response_id', T.UuidType.create())
        .required()
        .build(),
      Fb.create('created_at', T.MicrotimeType.create())
        .build(),
      Fb.create('ctx_request_ref', T.MessageRefType.create())
        .build(),
      /*
       * The "ctx_request" is the actual request object that "ctx_request_ref" refers to.
       * In some cases it's useful for request handlers to copy the request into the response
       * so the requestor has everything in one message. This will NOT always be populated.
       * A common use case is search request/response cycles where you want to know what the
       * search criteria was so you can render that along with the results.
       */
      Fb.create('ctx_request', T.MessageType.create())
        .anyOfCuries([
          'gdbots:pbjx:mixin:request',
        ])
        .build(),
      Fb.create('ctx_correlator_ref', T.MessageRefType.create())
        .build(),
    ];
  }
}
