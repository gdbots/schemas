import Enum from '@gdbots/pbj/Enum.js';

export default class PhoneType extends Enum {
}

PhoneType.configure({
  UNKNOWN: 'unknown',
  MOBILE: 'mobile',
  HOME: 'home',
  WORK: 'work',
  FAX: 'fax',
}, 'gdbots:common:phone-type');
