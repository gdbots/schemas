// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/process-irr/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import IrrType from '@gdbots/schemas/gdbots/forms/enums/IrrType';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class ProcessIrrV1Mixin {
  /**
   * @returns {SchemaId}
   */
  static getId() {
    return SchemaId.fromString(this.SCHEMA_ID);
  }

  /**
   * @param {string} name
   * @returns {boolean}
   */
  static hasField(name) {
    return this.FIELDS.includes(name);
  }

  /**
   * @returns {Field[]}
   */
  static getFields() {
    return [
      Fb.create(this.TYPE_FIELD, T.StringEnumType.create())
        .required()
        .classProto(IrrType)
        .build(),
      Fb.create(this.EMAIL_FIELD, T.StringType.create())
        .format(Format.EMAIL)
        .build(),
    ];
  }
}

const M = ProcessIrrV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:forms:mixin:process-irr:1-0-0';
M.SCHEMA_CURIE = 'gdbots:forms:mixin:process-irr';
M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:process-irr:v1';

M.TYPE_FIELD = 'type';
M.EMAIL_FIELD = 'email';

M.FIELDS = [
  M.TYPE_FIELD,
  M.EMAIL_FIELD,
];
