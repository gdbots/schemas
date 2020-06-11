// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-request/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class GetNodeRequestV1Mixin {
  /**
   * @returns {SchemaId}
   */
  static getId() {
    return SchemaId.fromString(this.SCHEMA_ID);
  }

  /**
   * @param {string} name
   * @returns {boolean}
   */
  static hasField(name) {
    return this.FIELDS.includes(name);
  }

  /**
   * @returns {Field[]}
   */
  static getFields() {
    return [
      /*
       * If true, a strongly consistent read is used; if false (the default), an eventually consistent read is used.
       */
      Fb.create(this.CONSISTENT_READ_FIELD, T.BooleanType.create())
        .build(),
      /*
       * When "node_ref" is supplied it SHOULD be used to perform the request.
       * The "node_ref" and "slug" are analogous to protobuf unions in that
       * only one of these should exist and the priority of selection is as
       * ordered in this schema.
       */
      Fb.create(this.NODE_REF_FIELD, T.NodeRefType.create())
        .build(),
      /*
       * The "qname" field should be populated when the request is not
       * using "node_ref", e.g. "acme:article"
       */
      Fb.create(this.QNAME_FIELD, T.StringType.create())
        .pattern('^[a-z0-9-]+:[a-z0-9-]+$')
        .build(),
      Fb.create(this.SLUG_FIELD, T.StringType.create())
        .format(Format.SLUG)
        .build(),
    ];
  }
}

const M = GetNodeRequestV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:get-node-request:1-0-2';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:get-node-request';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:get-node-request:v1';

M.CONSISTENT_READ_FIELD = 'consistent_read';
M.NODE_REF_FIELD = 'node_ref';
M.QNAME_FIELD = 'qname';
M.SLUG_FIELD = 'slug';

M.FIELDS = [
  M.CONSISTENT_READ_FIELD,
  M.NODE_REF_FIELD,
  M.QNAME_FIELD,
  M.SLUG_FIELD,
];
