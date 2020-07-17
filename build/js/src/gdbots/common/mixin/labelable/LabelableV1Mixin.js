// @link http://schemas.gdbots.io/json-schema/gdbots/common/mixin/labelable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class LabelableV1Mixin {
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
       * A set of strings used for categorization or workflow.
       * Similar to slack channels, github or gmail labels.
       */
      Fb.create(this.LABELS_FIELD, T.StringType.create())
        .asASet()
        .pattern('^[\\w-]+$')
        .build(),
    ];
  }
}

const M = LabelableV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:common:mixin:labelable:1-0-0';
M.SCHEMA_CURIE = 'gdbots:common:mixin:labelable';
M.SCHEMA_CURIE_MAJOR = 'gdbots:common:mixin:labelable:v1';

M.LABELS_FIELD = 'labels';

M.FIELDS = [
  M.LABELS_FIELD,
];
