import Enum from '@gdbots/pbj/Enum';

export default class Gender extends Enum {
}

Gender.configure({
  UNKNOWN: 0,
  MALE: 1,
  FEMALE: 2,
  NOT_SPECIFIED: 9,
}, 'gdbots:common:gender');
