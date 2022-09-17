import Enum from '@gdbots/pbj/Enum.js';

export default class Gender extends Enum {
}

Gender.configure({
  UNKNOWN: 0,
  MALE: 1,
  FEMALE: 2,
  NON_BINARY: 3,
  NOT_SPECIFIED: 9,
}, 'gdbots:common:gender');
