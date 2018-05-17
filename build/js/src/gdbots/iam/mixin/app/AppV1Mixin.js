// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/app/1-0-0.json#
import AppId from '@gdbots/schemas/gdbots/iam/AppId';
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:app:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('_id', T.IdentifierType.create())
        .required()
        .withDefault(() => AppId.generate())
        .classProto(AppId)
        .overridable(true)
        .build(),
    ];
  }
}
