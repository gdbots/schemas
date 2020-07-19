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
        Fb.create('name', T.StringType.create())
          .required()
          .maxLength(127)
          .pattern('^[a-zA-Z_]{1}[\\w-]*$')
          .build(),
        Fb.create('operator', T.StringEnumType.create())
          .withDefault(ComparisonOperator.EQUAL_TO)
          .classProto(ComparisonOperator)
          .build(),
        Fb.create('booleans', T.BooleanType.create())
          .asAList()
          .build(),
        Fb.create('dates', T.DateType.create())
          .asAList()
          .build(),
        Fb.create('floats', T.FloatType.create())
          .asAList()
          .build(),
        Fb.create('ints', T.IntType.create())
          .asAList()
          .build(),
        Fb.create('strings', T.StringType.create())
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
    return new MessageRef(this.schema().getCurie(), this.get('name'), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      name: this.get('name'),
    };
  }
}

const M = SearchFilterV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:common::search-filter:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:common::search-filter';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:common::search-filter:v1';
M.prototype.MIXINS = M.MIXINS = [];

Object.freeze(M);
Object.freeze(M.prototype);
