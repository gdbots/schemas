// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/sluggable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SluggableV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:sluggable:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * The "slug" is a secondary identifier, typically used in a url:
       * - MUST be url friendly
       * - SHOULD NOT be case sensitive
       * - SHOULD be unique within the message curie namespace
       * - CAN be changed, but in practice once nodes are published you should avoid it if possible
       */
      Fb.create('slug', T.StringType.create())
        .format(Format.SLUG)
        .build(),
    ];
  }
}
