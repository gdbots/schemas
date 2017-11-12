// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/field/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import Mixin from '@gdbots/pbj/Mixin';
import PiiImpact from '@gdbots/schemas/gdbots/forms/enums/PiiImpact';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class FieldV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:forms:mixin:field:1-0-2');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * A unique identifier (within the form) for the field. This value
       * is not shown to the user and should NOT change once set.
       */
      Fb.create('name', T.StringType.create())
        .required()
        .maxLength(127)
        .pattern('^[a-zA-Z_]{1}[\\w-]*$')
        .build(),
      /*
       * The name of the schema field the answer will map to. By default this
       * will go to the "cf" field which is a "dynamic-field" list containing
       * all answers filled out on the form (ref "gdbots:forms:mixin:send-submission").
       */
      Fb.create('maps_to', T.StringType.create())
        .maxLength(127)
        .pattern('^[a-zA-Z_]{1}\\w*$')
        .withDefault("cf")
        .build(),
      /*
       * The main text for the question/field.
       */
      Fb.create('label', T.StringType.create())
        .build(),
      Fb.create('placeholder', T.StringType.create())
        .build(),
      /*
       * A short description to better explain this field.
       */
      Fb.create('description', T.TextType.create())
        .build(),
      Fb.create('is_required', T.BooleanType.create())
        .build(),
      /*
       * The text that will replace the token "{link}" within the label or description.
       */
      Fb.create('link_text', T.StringType.create())
        .build(),
      /*
       * The URL to use for the replaced token "{link}" within the label or description.
       */
      Fb.create('link_url', T.StringType.create())
        .format(Format.URL)
        .build(),
      Fb.create('pii_impact', T.StringEnumType.create())
        .classProto(PiiImpact)
        .build(),
    ];
  }
}
