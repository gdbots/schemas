// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/facebook-user-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import PiiImpact from '@gdbots/schemas/gdbots/forms/enums/PiiImpact';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class FacebookUserFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
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
      ],
      this.MIXINS,
    );
  }
}

const M = FacebookUserFieldV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:forms:field:facebook-user-field:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:forms:field:facebook-user-field';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:field:facebook-user-field:v1';

M.prototype.MIXINS = M.MIXINS = [
  'gdbots:forms:mixin:field:v1',
  'gdbots:forms:mixin:field',
];

M.prototype.NAME_FIELD = M.NAME_FIELD = 'name';
M.prototype.MAPS_TO_FIELD = M.MAPS_TO_FIELD = 'maps_to';
M.prototype.LABEL_FIELD = M.LABEL_FIELD = 'label';
M.prototype.PLACEHOLDER_FIELD = M.PLACEHOLDER_FIELD = 'placeholder';
M.prototype.DESCRIPTION_FIELD = M.DESCRIPTION_FIELD = 'description';
M.prototype.IS_REQUIRED_FIELD = M.IS_REQUIRED_FIELD = 'is_required';
M.prototype.LINK_TEXT_FIELD = M.LINK_TEXT_FIELD = 'link_text';
M.prototype.LINK_URL_FIELD = M.LINK_URL_FIELD = 'link_url';
M.prototype.PII_IMPACT_FIELD = M.PII_IMPACT_FIELD = 'pii_impact';

M.prototype.FIELDS = M.FIELDS = [
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

GdbotsFormsFieldV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
