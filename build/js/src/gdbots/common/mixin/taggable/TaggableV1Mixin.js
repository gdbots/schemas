// @link http://schemas.gdbots.io/json-schema/gdbots/common/mixin/taggable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class TaggableV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:common:mixin:taggable:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * Tags is a map that categorizes data or tracks references in
       * external systems. The tags names should be consistent and descriptive,
       * e.g. fb_user_id:123, salesforce_customer_id:456.
       */
      Fb.create('tags', T.StringType.create())
        .asAMap()
        .pattern('^[\\w\\/\\.:-]+$')
        .build(),
    ];
  }
}
