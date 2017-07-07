import Enum from '@gdbots/common/Enum';

export default class Trinary extends Enum {
}

Trinary.configure({
  UNKNOWN: 0,
  TRUE_VAL: 1,
  FALSE_VAL: 2,
}, 'gdbots:common:trinary');
