// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/sluggable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SluggableV1Mixin {
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
       * The "slug" is a secondary identifier, typically used in a url:
       * - MUST be url friendly
       * - SHOULD NOT be case sensitive
       * - SHOULD be unique within the message curie namespace
       * - CAN be changed, but in practice once nodes are published you should avoid it if possible
       */
      Fb.create(this.SLUG_FIELD, T.StringType.create())
        .format(Format.SLUG)
        .build(),
    ];
  }
}

const M = SluggableV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:sluggable:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:sluggable';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:sluggable:v1';

M.SLUG_FIELD = 'slug';

M.FIELDS = [
  M.SLUG_FIELD,
];
