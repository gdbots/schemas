import Enum from '@gdbots/common/Enum';

export default class NodeStatus extends Enum {
}

NodeStatus.configure({
  UNKNOWN: 'unknown',
  PUBLISHED: 'published',
  SCHEDULED: 'scheduled',
  DRAFT: 'draft',
  EXPIRED: 'expired',
  DELETED: 'deleted',
}, 'gdbots:ncr:node-status');
