// @link http://schemas.gdbots.io/json-schema/gdbots/geo/address/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder.js';
import Message from '@gdbots/pbj/Message.js';
import MessageRef from '@gdbots/pbj/well-known/MessageRef.js';
import Schema from '@gdbots/pbj/Schema.js';
import T from '@gdbots/pbj/types/index.js';

export default class AddressV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create('geo_hash', T.StringType.create())
          .maxLength(20)
          .pattern('^\\w+$')
          .build(),
        Fb.create('geo_point', T.GeoPointType.create())
          .build(),
        /*
         * Indicates if a verification has been run on this address.
         */
        Fb.create('verified', T.BooleanType.create())
          .build(),
        /*
         * Indicates if this is a valid adddress or not. Generally only true if the
         * verified field is also true.
         */
        Fb.create('is_verified', T.BooleanType.create())
          .build(),
        Fb.create('street1', T.StringType.create())
          .build(),
        Fb.create('street2', T.StringType.create())
          .maxLength(20)
          .build(),
        Fb.create('po_box', T.StringType.create())
          .maxLength(20)
          .build(),
        Fb.create('city', T.StringType.create())
          .maxLength(100)
          .build(),
        Fb.create('county', T.StringType.create())
          .maxLength(100)
          .build(),
        /*
         * A two letter alpha or numeric code indicating the region, e.g. "CA".
         * @link http://www.maxmind.com/download/geoip/misc/region_codes.csv
         */
        Fb.create('region', T.StringType.create())
          .pattern('^[A-Z0-9]{2}$')
          .build(),
        /*
         * The full name of the region, e.g. "California".
         */
        Fb.create('region_name', T.StringType.create())
          .maxLength(150)
          .build(),
        Fb.create('postal_code', T.StringType.create())
          .maxLength(30)
          .pattern('^[\\w\\s-]+$')
          .build(),
        Fb.create('country', T.StringType.create())
          .pattern('^[A-Z]{2}$')
          .build(),
        Fb.create('continent', T.StringType.create())
          .build(),
      ],
      this.MIXINS,
    );
  }

  /**
   * @param {?string} tag
   * @returns {MessageRef}
   */
  generateMessageRef(tag = null) {
    return new MessageRef(this.schema().getCurie(), this.get('geo_hash'), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      geo_hash: this.get('geo_hash'),
    };
  }
}

const M = AddressV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:geo::address:1-0-2';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:geo::address';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:geo::address:v1';
M.prototype.MIXINS = M.MIXINS = [];

Object.freeze(M);
Object.freeze(M.prototype);
