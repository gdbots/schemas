// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/cloud/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class CloudV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.PROVIDER_FIELD, T.StringType.create())
          .maxLength(20)
          .format(Format.SLUG)
          .build(),
        Fb.create(this.REGION_FIELD, T.StringType.create())
          .maxLength(20)
          .format(Format.SLUG)
          .build(),
        Fb.create(this.ZONE_FIELD, T.StringType.create())
          .maxLength(20)
          .format(Format.SLUG)
          .build(),
        Fb.create(this.INSTANCE_ID_FIELD, T.StringType.create())
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.INSTANCE_TYPE_FIELD, T.StringType.create())
          .maxLength(20)
          .pattern('^[\\w\\.-]+$')
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
    return new MessageRef(this.schema().getCurie(), this.generateEtag(), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      provider: this.get(this.PROVIDER_FIELD),
      region: this.get(this.REGION_FIELD),
      zone: this.get(this.ZONE_FIELD),
      instance_id: this.get(this.INSTANCE_ID_FIELD),
      instance_type: this.get(this.INSTANCE_TYPE_FIELD),
    };
  }
}

const M = CloudV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:contexts::cloud:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:contexts::cloud';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:contexts::cloud:v1';

M.prototype.MIXINS = M.MIXINS = [];

M.prototype.PROVIDER_FIELD = M.PROVIDER_FIELD = 'provider';
M.prototype.REGION_FIELD = M.REGION_FIELD = 'region';
M.prototype.ZONE_FIELD = M.ZONE_FIELD = 'zone';
M.prototype.INSTANCE_ID_FIELD = M.INSTANCE_ID_FIELD = 'instance_id';
M.prototype.INSTANCE_TYPE_FIELD = M.INSTANCE_TYPE_FIELD = 'instance_type';

M.prototype.FIELDS = M.FIELDS = [
  M.PROVIDER_FIELD,
  M.REGION_FIELD,
  M.ZONE_FIELD,
  M.INSTANCE_ID_FIELD,
  M.INSTANCE_TYPE_FIELD,
];

Object.freeze(M);
Object.freeze(M.prototype);
