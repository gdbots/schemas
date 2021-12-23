import { v5 as uuidv5 } from 'uuid';
import AssertionFailed from '@gdbots/pbj/exceptions/AssertionFailed.js';
import Identifier from '@gdbots/pbj/well-known/Identifier.js';

/**
 * For each vendor namespace we create a version 5 uuid
 * so the generated ids for an edge don't collide.
 *
 * @type {Map}
 */
const namespaces = new Map();

export default class EdgeId extends Identifier {
  /**
   * @param {string} value
   */
  constructor(value) {
    super(value);

    if (!/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-5[0-9A-Fa-f]{3}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/.test(this.value)) {
      throw new AssertionFailed(`Value "${this.value}" is not a valid version 5 UUID.`);
    }

    Object.freeze(this);
  }

  /**
   * @param {Message} edge
   *
   * @returns {EdgeId}
   */
  static fromEdge(edge) {
    const schemaId = edge.schema().getId();
    const vendor = schemaId.getVendor();

    if (!namespaces.has(vendor)) {
      namespaces.set(vendor, uuidv5(vendor, '00000000-0000-0000-0000-000000000000'));
    }

    const id = `${edge.get('from_ref')}~${schemaId.getMessage()}~${edge.get('to_ref')}`;
    return new EdgeId(uuidv5(id, namespaces.get(vendor)));
  }
}
