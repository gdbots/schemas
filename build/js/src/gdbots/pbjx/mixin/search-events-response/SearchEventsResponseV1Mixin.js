// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/search-events-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class SearchEventsResponseV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:pbjx:mixin:search-events-response:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * The total number of events matching the search.
       */
      Fb.create('total', T.IntType.create())
        .build(),
      Fb.create('has_more', T.BooleanType.create())
        .build(),
      /*
       * How long in milliseconds it took to run the query.
       */
      Fb.create('time_taken', T.MediumIntType.create())
        .build(),
      /*
       * The maximum score of a matching event from the entire search.
       */
      Fb.create('max_score', T.FloatType.create())
        .build(),
      /*
       * Cursors are optionally provided by the underlying search system to allow for efficient
       * pagination. In the absense of cursors, paging is done using count and page number.
       */
      Fb.create('cursors', T.StringType.create())
        .asAMap()
        .build(),
      Fb.create('events', T.MessageType.create())
        .asAList()
        .anyOfCuries([
          'gdbots:pbjx:mixin:event',
        ])
        .overridable(true)
        .build(),
    ];
  }
}
