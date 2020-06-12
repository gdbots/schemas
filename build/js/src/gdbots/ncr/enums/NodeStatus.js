import Enum from '@gdbots/pbj/Enum';

export default class NodeStatus extends Enum {
}

NodeStatus.configure({
  UNKNOWN: 'unknown',
  PUBLISHED: 'published',
  SCHEDULED: 'scheduled',
  PENDING: 'pending',
  DRAFT: 'draft',
  EXPIRED: 'expired',
  ARCHIVED: 'archived',
  DELETED: 'deleted',
}, 'gdbots:ncr:node-status');
