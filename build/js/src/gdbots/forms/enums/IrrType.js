import Enum from '@gdbots/pbj/Enum';

export default class IrrType extends Enum {
}

IrrType.configure({
  UNKNOWN: 'unknown',
  ACCESS_DATA: 'access-data',
  DELETE_DATA: 'delete-data',
  DO_NOT_SELL: 'do-not-sell',
  OPTOUT: 'optout',
}, 'gdbots:forms:irr-type');
