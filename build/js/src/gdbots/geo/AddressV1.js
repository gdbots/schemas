// @link http://schemas.gdbots.io/json-schema/gdbots/geo/address/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class AddressV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.GEO_HASH_FIELD, T.StringType.create())
          .maxLength(20)
          .pattern('^\\w+$')
          .build(),
        Fb.create(this.GEO_POINT_FIELD, T.GeoPointType.create())
          .build(),
        /*
         * Indicates if a verification has been run on this address.
         */
        Fb.create(this.VERIFIED_FIELD, T.BooleanType.create())
          .build(),
        /*
         * Indicates if this is a valid adddress or not. Generally only true if the
         * verified field is also true.
         */
        Fb.create(this.IS_VERIFIED_FIELD, T.BooleanType.create())
          .build(),
        Fb.create(this.STREET1_FIELD, T.StringType.create())
          .build(),
        Fb.create(this.STREET2_FIELD, T.StringType.create())
          .maxLength(20)
          .build(),
        Fb.create(this.PO_BOX_FIELD, T.StringType.create())
          .maxLength(20)
          .build(),
        Fb.create(this.CITY_FIELD, T.StringType.create())
          .maxLength(100)
          .build(),
        Fb.create(this.COUNTY_FIELD, T.StringType.create())
          .maxLength(100)
          .build(),
        /*
         * A two letter alpha or numeric code indicating the region, e.g. "CA".
         * @link http://www.maxmind.com/download/geoip/misc/region_codes.csv
         */
        Fb.create(this.REGION_FIELD, T.StringType.create())
          .pattern('^[A-Z0-9]{2}$')
          .build(),
        /*
         * The full name of the region, e.g. "California".
         */
        Fb.create(this.REGION_NAME_FIELD, T.StringType.create())
          .maxLength(150)
          .build(),
        Fb.create(this.POSTAL_CODE_FIELD, T.StringType.create())
          .maxLength(30)
          .pattern('^[\\w\\s-]+$')
          .build(),
        Fb.create(this.COUNTRY_FIELD, T.StringType.create())
          .pattern('^[A-Z]{2}$')
          .build(),
        Fb.create(this.CONTINENT_FIELD, T.StringType.create())
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
    return new MessageRef(this.schema().getCurie(), this.get(this.GEO_HASH_FIELD), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      geo_hash: this.get(this.GEO_HASH_FIELD),
    };
  }
}

const M = AddressV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:geo::address:1-0-2';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:geo::address';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:geo::address:v1';

M.prototype.MIXINS = M.MIXINS = [];

M.prototype.GEO_HASH_FIELD = M.GEO_HASH_FIELD = 'geo_hash';
M.prototype.GEO_POINT_FIELD = M.GEO_POINT_FIELD = 'geo_point';
M.prototype.VERIFIED_FIELD = M.VERIFIED_FIELD = 'verified';
M.prototype.IS_VERIFIED_FIELD = M.IS_VERIFIED_FIELD = 'is_verified';
M.prototype.STREET1_FIELD = M.STREET1_FIELD = 'street1';
M.prototype.STREET2_FIELD = M.STREET2_FIELD = 'street2';
M.prototype.PO_BOX_FIELD = M.PO_BOX_FIELD = 'po_box';
M.prototype.CITY_FIELD = M.CITY_FIELD = 'city';
M.prototype.COUNTY_FIELD = M.COUNTY_FIELD = 'county';
M.prototype.REGION_FIELD = M.REGION_FIELD = 'region';
M.prototype.REGION_NAME_FIELD = M.REGION_NAME_FIELD = 'region_name';
M.prototype.POSTAL_CODE_FIELD = M.POSTAL_CODE_FIELD = 'postal_code';
M.prototype.COUNTRY_FIELD = M.COUNTRY_FIELD = 'country';
M.prototype.CONTINENT_FIELD = M.CONTINENT_FIELD = 'continent';

M.prototype.FIELDS = M.FIELDS = [
  M.GEO_HASH_FIELD,
  M.GEO_POINT_FIELD,
  M.VERIFIED_FIELD,
  M.IS_VERIFIED_FIELD,
  M.STREET1_FIELD,
  M.STREET2_FIELD,
  M.PO_BOX_FIELD,
  M.CITY_FIELD,
  M.COUNTY_FIELD,
  M.REGION_FIELD,
  M.REGION_NAME_FIELD,
  M.POSTAL_CODE_FIELD,
  M.COUNTRY_FIELD,
  M.CONTINENT_FIELD,
];

Object.freeze(M);
Object.freeze(M.prototype);
