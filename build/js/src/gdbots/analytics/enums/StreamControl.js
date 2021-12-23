import Enum from '@gdbots/pbj/Enum.js';

export default class StreamControl extends Enum {
}

StreamControl.configure({
  UNKNOWN: 0,
  CTRL_STOP: 0,
  CTRL_CONTINUE: 1,
}, 'gdbots:analytics:stream-control');
