import Enum from '@gdbots/common/Enum';

export default class PiiImpact extends Enum {
}

PiiImpact.configure({
  UNKNOWN: 'unknown',
  HIGH: 'high',
  MODERATE: 'moderate',
  LOW: 'low',
}, 'gdbots:forms:pii-impact');
