// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/time-parting/1-0-0.json#
import DayOfWeek from '@gdbots/schemas/gdbots/common/enums/DayOfWeek';
import Fb from '@gdbots/pbj/FieldBuilder';
import Month from '@gdbots/schemas/gdbots/common/enums/Month';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class TimePartingV1Mixin {
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
      Fb.create(this.MONTH_OF_YEAR_FIELD, T.IntEnumType.create())
        .withDefault(Month.UNKNOWN)
        .classProto(Month)
        .build(),
      Fb.create(this.DAY_OF_MONTH_FIELD, T.TinyIntType.create())
        .max(31)
        .build(),
      Fb.create(this.DAY_OF_WEEK_FIELD, T.IntEnumType.create())
        .withDefault(DayOfWeek.UNKNOWN)
        .classProto(DayOfWeek)
        .build(),
      Fb.create(this.IS_WEEKEND_FIELD, T.BooleanType.create())
        .build(),
      Fb.create(this.HOUR_OF_DAY_FIELD, T.TinyIntType.create())
        .max(23)
        .build(),
    ];
  }
}

const M = TimePartingV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:time-parting:1-0-0';
M.SCHEMA_CURIE = 'gdbots:enrichments:mixin:time-parting';
M.SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:time-parting:v1';

M.MONTH_OF_YEAR_FIELD = 'month_of_year';
M.DAY_OF_MONTH_FIELD = 'day_of_month';
M.DAY_OF_WEEK_FIELD = 'day_of_week';
M.IS_WEEKEND_FIELD = 'is_weekend';
M.HOUR_OF_DAY_FIELD = 'hour_of_day';

M.FIELDS = [
  M.MONTH_OF_YEAR_FIELD,
  M.DAY_OF_MONTH_FIELD,
  M.DAY_OF_WEEK_FIELD,
  M.IS_WEEKEND_FIELD,
  M.HOUR_OF_DAY_FIELD,
];
