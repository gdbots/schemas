// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/field/1-0-2.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import PiiImpact from '@gdbots/schemas/gdbots/forms/enums/PiiImpact';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class FieldV1Mixin {
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
      /*
       * A unique identifier (within the form) for the field. This value
       * is not shown to the user and should NOT change once set.
       */
      Fb.create(this.NAME_FIELD, T.StringType.create())
        .required()
        .maxLength(127)
        .pattern('^[a-zA-Z_]{1}[\\w-]*$')
        .build(),
      /*
       * The name of the schema field the answer will map to. By default this
       * will go to the "cf" field which is a "dynamic-field" list containing
       * all answers filled out on the form (ref "gdbots:forms:mixin:send-submission").
       */
      Fb.create(this.MAPS_TO_FIELD, T.StringType.create())
        .maxLength(127)
        .pattern('^[a-zA-Z_]{1}\\w*$')
        .withDefault("cf")
        .build(),
      /*
       * The main text for the question/field.
       */
      Fb.create(this.LABEL_FIELD, T.StringType.create())
        .build(),
      Fb.create(this.PLACEHOLDER_FIELD, T.StringType.create())
        .build(),
      /*
       * A short description to better explain this field.
       */
      Fb.create(this.DESCRIPTION_FIELD, T.TextType.create())
        .build(),
      Fb.create(this.IS_REQUIRED_FIELD, T.BooleanType.create())
        .build(),
      /*
       * The text that will replace the token "{link}" within the label or description.
       */
      Fb.create(this.LINK_TEXT_FIELD, T.StringType.create())
        .build(),
      /*
       * The URL to use for the replaced token "{link}" within the label or description.
       */
      Fb.create(this.LINK_URL_FIELD, T.StringType.create())
        .format(Format.URL)
        .build(),
      Fb.create(this.PII_IMPACT_FIELD, T.StringEnumType.create())
        .classProto(PiiImpact)
        .build(),
    ];
  }
}

const M = FieldV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:forms:mixin:field:1-0-2';
M.SCHEMA_CURIE = 'gdbots:forms:mixin:field';
M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:field:v1';

M.NAME_FIELD = 'name';
M.MAPS_TO_FIELD = 'maps_to';
M.LABEL_FIELD = 'label';
M.PLACEHOLDER_FIELD = 'placeholder';
M.DESCRIPTION_FIELD = 'description';
M.IS_REQUIRED_FIELD = 'is_required';
M.LINK_TEXT_FIELD = 'link_text';
M.LINK_URL_FIELD = 'link_url';
M.PII_IMPACT_FIELD = 'pii_impact';

M.FIELDS = [
  M.NAME_FIELD,
  M.MAPS_TO_FIELD,
  M.LABEL_FIELD,
  M.PLACEHOLDER_FIELD,
  M.DESCRIPTION_FIELD,
  M.IS_REQUIRED_FIELD,
  M.LINK_TEXT_FIELD,
  M.LINK_URL_FIELD,
  M.PII_IMPACT_FIELD,
];
