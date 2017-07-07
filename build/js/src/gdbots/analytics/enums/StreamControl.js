import Enum from '@gdbots/common/Enum';

export default class StreamControl extends Enum {
}

StreamControl.configure({
  UNKNOWN: 0,
  CTRL_STOP: 0,
  CTRL_CONTINUE: 1,
}, 'gdbots:analytics:stream-control');
