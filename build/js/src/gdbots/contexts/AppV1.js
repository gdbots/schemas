// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class AppV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this._ID_FIELD, T.UuidType.create())
          .useTypeDefault(false)
          .build(),
        Fb.create(this.VENDOR_FIELD, T.StringType.create())
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.NAME_FIELD, T.StringType.create())
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.VERSION_FIELD, T.StringType.create())
          .maxLength(20)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.BUILD_FIELD, T.StringType.create())
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.VARIANT_FIELD, T.StringType.create())
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
    const id = this.get(this._ID_FIELD) || this.generateEtag();
    return new MessageRef(this.schema().getCurie(), `${id}`, tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      _id: `${this.get(this._ID_FIELD, '')}`,
      vendor: this.get(this.VENDOR_FIELD),
      name: this.get(this.NAME_FIELD),
      version: this.get(this.VERSION_FIELD),
      build: this.get(this.BUILD_FIELD),
      variant: this.get(this.VARIANT_FIELD),
    };
  }
}

const M = AppV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:contexts::app:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:contexts::app';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:contexts::app:v1';

M.prototype.MIXINS = M.MIXINS = [];

M.prototype._ID_FIELD = M._ID_FIELD = '_id';
M.prototype.VENDOR_FIELD = M.VENDOR_FIELD = 'vendor';
M.prototype.NAME_FIELD = M.NAME_FIELD = 'name';
M.prototype.VERSION_FIELD = M.VERSION_FIELD = 'version';
M.prototype.BUILD_FIELD = M.BUILD_FIELD = 'build';
M.prototype.VARIANT_FIELD = M.VARIANT_FIELD = 'variant';

M.prototype.FIELDS = M.FIELDS = [
  M._ID_FIELD,
  M.VENDOR_FIELD,
  M.NAME_FIELD,
  M.VERSION_FIELD,
  M.BUILD_FIELD,
  M.VARIANT_FIELD,
];

Object.freeze(M);
Object.freeze(M.prototype);
