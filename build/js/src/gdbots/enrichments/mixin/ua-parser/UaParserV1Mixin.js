// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/ua-parser/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class UaParserV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:enrichments:mixin:ua-parser:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('ctx_ua', T.TextType.create())
        .overridable(true)
        .build(),
      Fb.create('ctx_ua_parsed', T.MessageType.create())
        .anyOfCuries([
          'gdbots:contexts::user-agent',
        ])
        .build(),
    ];
  }
}
