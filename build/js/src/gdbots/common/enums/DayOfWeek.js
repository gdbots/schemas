import Enum from '@gdbots/pbj/Enum.js';

export default class DayOfWeek extends Enum {
}

DayOfWeek.configure({
  UNKNOWN: 0,
  MONDAY: 1,
  TUESDAY: 2,
  WEDNESDAY: 3,
  THURSDAY: 4,
  FRIDAY: 5,
  SATURDAY: 6,
  SUNDAY: 7,
}, 'gdbots:common:day-of-week');
