// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-forms-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SearchFormsResponseV1Mixin {
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
      Fb.create(this.NODES_FIELD, T.MessageType.create())
        .asAList()
        .anyOfCuries([
          'gdbots:forms:mixin:form',
        ])
        .build(),
    ];
  }
}

const M = SearchFormsResponseV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:forms:mixin:search-forms-response:1-0-0';
M.SCHEMA_CURIE = 'gdbots:forms:mixin:search-forms-response';
M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:search-forms-response:v1';

M.NODES_FIELD = 'nodes';

M.FIELDS = [
  M.NODES_FIELD,
];
