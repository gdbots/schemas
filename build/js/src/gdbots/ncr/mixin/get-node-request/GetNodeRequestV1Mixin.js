// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-request/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetNodeRequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:get-node-request:1-0-1');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * If true, a strongly consistent read is used; if false (the default), an eventually consistent read is used.
       */
      Fb.create('consistent_read', T.BooleanType.create())
        .build(),
      /*
       * When "node_ref" is supplied it SHOULD be used to perform the request.
       * The "node_ref" and "slug" are analogous to protobuf unions in that
       * only one of these should exist and the priority of selection is as
       * ordered in this schema.
       */
      Fb.create('node_ref', T.IdentifierType.create())
        .classProto(NodeRef)
        .build(),
      /*
       * The "qname" field should be populated when the request is not
       * using "node_ref", e.g. "acme:article"
       */
      Fb.create('qname', T.StringType.create())
        .pattern('^[a-z0-9-]+:[a-z0-9-]+$')
        .build(),
      Fb.create('slug', T.StringType.create())
        .format(Format.SLUG)
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
