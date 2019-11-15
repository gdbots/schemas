// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/process-irr/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import IrrType from '@gdbots/schemas/gdbots/forms/enums/IrrType';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class ProcessIrrV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:process-irr:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('type', T.StringEnumType.create())
        .required()
        .classProto(IrrType)
        .build(),
      Fb.create('email', T.StringType.create())
        .format(Format.EMAIL)
        .build(),
    ];
  }
}
