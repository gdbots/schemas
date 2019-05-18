// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/ip-to-geo/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class IpToGeoV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:enrichments:mixin:ip-to-geo:1-0-1');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('ctx_ip', T.StringType.create())
        .format(Format.IPV4)
        .overridable(true)
        .build(),
      Fb.create('ctx_ipv6', T.StringType.create())
        .format(Format.IPV6)
        .overridable(true)
        .build(),
      Fb.create('ctx_ip_geo', T.MessageType.create())
        .anyOfCuries([
          'gdbots:geo::address',
        ])
        .build(),
    ];
  }
}
