// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-forms-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import SearchFormsSort from '@gdbots/schemas/gdbots/forms/enums/SearchFormsSort';
import T from '@gdbots/pbj/types';

export default class SearchFormsRequestV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:search-forms-request:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('sort', T.StringEnumType.create())
        .withDefault(SearchFormsSort.RELEVANCE)
        .classProto(SearchFormsSort)
        .build(),
    ];
  }
}
