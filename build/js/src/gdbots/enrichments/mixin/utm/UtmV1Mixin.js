// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/utm/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class UtmV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:enrichments:mixin:utm:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('utm_source', T.StringType.create())
        .maxLength(50)
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create('utm_medium', T.StringType.create())
        .maxLength(50)
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create('utm_term', T.StringType.create())
        .maxLength(100)
        .pattern('^[\\w\\s\\/\\.,:-]+$')
        .build(),
      Fb.create('utm_content', T.StringType.create())
        .maxLength(50)
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
      Fb.create('utm_campaign', T.StringType.create())
        .maxLength(50)
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
    ];
  }
}
