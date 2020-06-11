// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/ip-to-geo/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class IpToGeoV1Mixin {
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
      Fb.create(this.CTX_IP_FIELD, T.StringType.create())
        .format(Format.IPV4)
        .overridable(true)
        .build(),
      Fb.create(this.CTX_IPV6_FIELD, T.StringType.create())
        .format(Format.IPV6)
        .overridable(true)
        .build(),
      Fb.create(this.CTX_IP_GEO_FIELD, T.MessageType.create())
        .anyOfCuries([
          'gdbots:geo::address',
        ])
        .build(),
    ];
  }
}

const M = IpToGeoV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:ip-to-geo:1-0-1';
M.SCHEMA_CURIE = 'gdbots:enrichments:mixin:ip-to-geo';
M.SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:ip-to-geo:v1';

M.CTX_IP_FIELD = 'ctx_ip';
M.CTX_IPV6_FIELD = 'ctx_ipv6';
M.CTX_IP_GEO_FIELD = 'ctx_ip_geo';

M.FIELDS = [
  M.CTX_IP_FIELD,
  M.CTX_IPV6_FIELD,
  M.CTX_IP_GEO_FIELD,
];
