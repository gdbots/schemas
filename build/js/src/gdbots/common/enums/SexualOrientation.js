import Enum from '@gdbots/pbj/Enum.js';

export default class SexualOrientation extends Enum {
}

SexualOrientation.configure({
  UNKNOWN: 'unknown',
  HETEROSEXUAL: '1',
  HOMOSEXUAL: '2',
  BISEXUAL: '3',
  OTHER: '4',
  NOT_SURE: 'U',
  NOT_SPECIFIED: 'Z',
}, 'gdbots:common:sexual-orientation');
