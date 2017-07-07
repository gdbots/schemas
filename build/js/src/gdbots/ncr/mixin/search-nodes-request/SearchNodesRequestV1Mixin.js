// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/search-nodes-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SearchNodesRequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:search-nodes-request:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('q', T.TextType.create())
        .maxLength(2000)
        .build(),
      /*
       * The number of results to return.
       */
      Fb.create('count', T.TinyIntType.create())
        .withDefault(25)
        .build(),
      Fb.create('page', T.TinyIntType.create())
        .min(1)
        .withDefault(1)
        .build(),
      /*
       * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
       * When cursor is present it should be used instead of "page".
       */
      Fb.create('cursor', T.StringType.create())
        .build(),
      Fb.create('status', T.StringEnumType.create())
        .classProto(NodeStatus)
        .build(),
      Fb.create('created_after', T.DateTimeType.create())
        .build(),
      Fb.create('created_before', T.DateTimeType.create())
        .build(),
      Fb.create('updated_after', T.DateTimeType.create())
        .build(),
      Fb.create('updated_before', T.DateTimeType.create())
        .build(),
      /*
       * The fields that are being queried as determined by parsing the "q" field.
       */
      Fb.create('fields_used', T.StringType.create())
        .asASet()
        .pattern('^[\\w\\.-]+$')
        .build(),
      Fb.create('parsed_query_json', T.TextType.create())
        .build(),
    ];
  }
}
