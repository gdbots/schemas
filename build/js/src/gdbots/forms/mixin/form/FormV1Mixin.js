// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/form/1-0-1.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import FileId from '@gdbots/schemas/gdbots/files/FileId';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import PiiImpact from '@gdbots/schemas/gdbots/forms/enums/PiiImpact';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class FormV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:form:1-0-1');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * A short description (a few sentences) about this form. This field should
       * not have html as it is used in metadata.
       */
      Fb.create('description', T.TextType.create())
        .build(),
      Fb.create('fields', T.MessageType.create())
        .asAList()
        .anyOfCuries([
          'gdbots:forms:mixin:field',
        ])
        .build(),
      Fb.create('hashtags', T.StringType.create())
        .asASet()
        .format(Format.HASHTAG)
        .build(),
      Fb.create('disclaimer', T.TextType.create())
        .build(),
      Fb.create('image_id', T.IdentifierType.create())
        .classProto(FileId)
        .build(),
      Fb.create('pii_impact', T.StringEnumType.create())
        .classProto(PiiImpact)
        .build(),
    ];
  }
}
