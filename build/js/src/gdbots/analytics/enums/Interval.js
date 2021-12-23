import Enum from '@gdbots/pbj/Enum.js';

export default class Interval extends Enum {
}

Interval.configure({
  UNKNOWN: 'unknown',
  MINUTELY: 'minutely',
  HOURLY: 'hourly',
  DAILY: 'daily',
  WEEKLY: 'weekly',
  MONTHLY: 'monthly',
  YEARLY: 'yearly',
}, 'gdbots:analytics:interval');
