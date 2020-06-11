// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/ua-parser/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class UaParserV1Mixin {
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
      Fb.create(this.CTX_UA_FIELD, T.TextType.create())
        .overridable(true)
        .build(),
      Fb.create(this.CTX_UA_PARSED_FIELD, T.MessageType.create())
        .anyOfCuries([
          'gdbots:contexts::user-agent',
        ])
        .build(),
    ];
  }
}

const M = UaParserV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:ua-parser:1-0-0';
M.SCHEMA_CURIE = 'gdbots:enrichments:mixin:ua-parser';
M.SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:ua-parser:v1';

M.CTX_UA_FIELD = 'ctx_ua';
M.CTX_UA_PARSED_FIELD = 'ctx_ua_parsed';

M.FIELDS = [
  M.CTX_UA_FIELD,
  M.CTX_UA_PARSED_FIELD,
];
