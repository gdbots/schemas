import Enum from '@gdbots/pbj/Enum.js';

export default class EdgeMultiplicity extends Enum {
}

EdgeMultiplicity.configure({
  UNKNOWN: 'unknown',
  MULTI: 'multi',
  SIMPLE: 'simple',
  MANY2ONE: 'many2one',
  ONE2MANY: 'one2many',
  ONE2ONE: 'one2one',
}, 'gdbots:ncr:edge-multiplicity');
