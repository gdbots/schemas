// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/time-parting/1-0-0.json#
import DayOfWeek from '@gdbots/schemas/gdbots/common/enums/DayOfWeek';
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import Month from '@gdbots/schemas/gdbots/common/enums/Month';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class TimePartingV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:enrichments:mixin:time-parting:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('month_of_year', T.IntEnumType.create())
        .withDefault(Month.UNKNOWN)
        .classProto(Month)
        .build(),
      Fb.create('day_of_month', T.TinyIntType.create())
        .max(31)
        .build(),
      Fb.create('day_of_week', T.IntEnumType.create())
        .withDefault(DayOfWeek.UNKNOWN)
        .classProto(DayOfWeek)
        .build(),
      Fb.create('is_weekend', T.BooleanType.create())
        .build(),
      Fb.create('hour_of_day', T.TinyIntType.create())
        .max(23)
        .build(),
    ];
  }
}
