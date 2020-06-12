// @link http://schemas.gdbots.io/json-schema/gdbots/common/mixin/taggable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class TaggableV1Mixin {
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
       * Tags is a map that categorizes data or tracks references in
       * external systems. The tags names should be consistent and descriptive,
       * e.g. fb_user_id:123, salesforce_customer_id:456.
       */
      Fb.create(this.TAGS_FIELD, T.StringType.create())
        .asAMap()
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
    ];
  }
}

const M = TaggableV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:common:mixin:taggable:1-0-0';
M.SCHEMA_CURIE = 'gdbots:common:mixin:taggable';
M.SCHEMA_CURIE_MAJOR = 'gdbots:common:mixin:taggable:v1';

M.TAGS_FIELD = 'tags';

M.FIELDS = [
  M.TAGS_FIELD,
];
