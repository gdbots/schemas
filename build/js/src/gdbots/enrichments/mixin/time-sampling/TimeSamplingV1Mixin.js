// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/time-sampling/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class TimeSamplingV1Mixin {
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
      Fb.create(this.TS_YMDH_FIELD, T.IntType.create())
        .build(),
      Fb.create(this.TS_YMD_FIELD, T.IntType.create())
        .build(),
      Fb.create(this.TS_YM_FIELD, T.MediumIntType.create())
        .build(),
    ];
  }
}

const M = TimeSamplingV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:time-sampling:1-0-0';
M.SCHEMA_CURIE = 'gdbots:enrichments:mixin:time-sampling';
M.SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:time-sampling:v1';

M.TS_YMDH_FIELD = 'ts_ymdh';
M.TS_YMD_FIELD = 'ts_ymd';
M.TS_YM_FIELD = 'ts_ym';

M.FIELDS = [
  M.TS_YMDH_FIELD,
  M.TS_YMD_FIELD,
  M.TS_YM_FIELD,
];
