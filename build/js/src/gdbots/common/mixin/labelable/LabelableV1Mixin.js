// @link http://schemas.gdbots.io/json-schema/gdbots/common/mixin/labelable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class LabelableV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:common:mixin:labelable:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * A set of strings used for categorization or workflow.
       * Similar to slack channels, github or gmail labels.
       */
      Fb.create('labels', T.StringType.create())
        .asASet()
        .pattern('^[\\w-]+$')
        .build(),
    ];
  }
}
