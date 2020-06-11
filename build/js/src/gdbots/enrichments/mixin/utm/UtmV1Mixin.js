// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/utm/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class UtmV1Mixin {
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
      Fb.create(this.UTM_SOURCE_FIELD, T.StringType.create())
        .maxLength(50)
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create(this.UTM_MEDIUM_FIELD, T.StringType.create())
        .maxLength(50)
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create(this.UTM_TERM_FIELD, T.StringType.create())
        .maxLength(100)
        .pattern('^[\\w\\s\\/\\.,:-]+$')
        .build(),
      Fb.create(this.UTM_CONTENT_FIELD, T.StringType.create())
        .maxLength(50)
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create(this.UTM_CAMPAIGN_FIELD, T.StringType.create())
        .maxLength(50)
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
    ];
  }
}

const M = UtmV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:utm:1-0-0';
M.SCHEMA_CURIE = 'gdbots:enrichments:mixin:utm';
M.SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:utm:v1';

M.UTM_SOURCE_FIELD = 'utm_source';
M.UTM_MEDIUM_FIELD = 'utm_medium';
M.UTM_TERM_FIELD = 'utm_term';
M.UTM_CONTENT_FIELD = 'utm_content';
M.UTM_CAMPAIGN_FIELD = 'utm_campaign';

M.FIELDS = [
  M.UTM_SOURCE_FIELD,
  M.UTM_MEDIUM_FIELD,
  M.UTM_TERM_FIELD,
  M.UTM_CONTENT_FIELD,
  M.UTM_CAMPAIGN_FIELD,
];
