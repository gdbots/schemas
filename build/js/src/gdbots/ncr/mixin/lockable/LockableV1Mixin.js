// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/lockable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class LockableV1Mixin {
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
       * A node being locked will vary in how it's implemented but the
       * general idea is that only the user who locked it can modify it.
       */
      Fb.create(this.IS_LOCKED_FIELD, T.BooleanType.create())
        .build(),
      /*
       * The user (or app) that has "locked" the node.
       */
      Fb.create(this.LOCKED_BY_REF_FIELD, T.NodeRefType.create())
        .build(),
    ];
  }
}

const M = LockableV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:ncr:mixin:lockable:1-0-0';
M.SCHEMA_CURIE = 'gdbots:ncr:mixin:lockable';
M.SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:lockable:v1';

M.IS_LOCKED_FIELD = 'is_locked';
M.LOCKED_BY_REF_FIELD = 'locked_by_ref';

M.FIELDS = [
  M.IS_LOCKED_FIELD,
  M.LOCKED_BY_REF_FIELD,
];
