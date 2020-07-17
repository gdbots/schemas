// @link http://schemas.gdbots.io/json-schema/gdbots/common/search-filter/1-0-0.json#
import ComparisonOperator from '@gdbots/schemas/gdbots/common/enums/ComparisonOperator';
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SearchFilterV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.NAME_FIELD, T.StringType.create())
          .required()
          .maxLength(127)
          .pattern('^[a-zA-Z_]{1}[\\w-]*$')
          .build(),
        Fb.create(this.OPERATOR_FIELD, T.StringEnumType.create())
          .withDefault(ComparisonOperator.EQUAL_TO)
          .classProto(ComparisonOperator)
          .build(),
        Fb.create(this.BOOLS_FIELD, T.BooleanType.create())
          .asAList()
          .build(),
        Fb.create(this.DATES_FIELD, T.DateType.create())
          .asAList()
          .build(),
        Fb.create(this.FLOATS_FIELD, T.FloatType.create())
          .asAList()
          .build(),
        Fb.create(this.INTS_FIELD, T.IntType.create())
          .asAList()
          .build(),
        Fb.create(this.STRINGS_FIELD, T.StringType.create())
          .asAList()
          .build(),
      ],
      this.MIXINS,
    );
  }

  /**
   * @param {?string} tag
   * @returns {MessageRef}
   */
  generateMessageRef(tag = null) {
    return new MessageRef(this.schema().getCurie(), this.get(this.NAME_FIELD), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      name: this.get(this.NAME_FIELD),
    };
  }
}

const M = SearchFilterV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:common::search-filter:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:common::search-filter';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:common::search-filter:v1';

M.prototype.MIXINS = M.MIXINS = [];

M.prototype.NAME_FIELD = M.NAME_FIELD = 'name';
M.prototype.OPERATOR_FIELD = M.OPERATOR_FIELD = 'operator';
M.prototype.BOOLS_FIELD = M.BOOLS_FIELD = 'bools';
M.prototype.DATES_FIELD = M.DATES_FIELD = 'dates';
M.prototype.FLOATS_FIELD = M.FLOATS_FIELD = 'floats';
M.prototype.INTS_FIELD = M.INTS_FIELD = 'ints';
M.prototype.STRINGS_FIELD = M.STRINGS_FIELD = 'strings';

M.prototype.FIELDS = M.FIELDS = [
  M.NAME_FIELD,
  M.OPERATOR_FIELD,
  M.BOOLS_FIELD,
  M.DATES_FIELD,
  M.FLOATS_FIELD,
  M.INTS_FIELD,
  M.STRINGS_FIELD,
];

Object.freeze(M);
Object.freeze(M.prototype);
