// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/lockable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class LockableV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:ncr:mixin:lockable:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * A node being locked will vary in how it's implemented but the
       * general idea is that only the user who locked it can modify it.
       */
      Fb.create('is_locked', T.BooleanType.create())
        .build(),
      /*
       * The user (or app) that has "locked" the node.
       */
      Fb.create('locked_by_ref', T.NodeRefType.create())
        .build(),
    ];
  }
}
