// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/youtube-video-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsFormsFieldV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Mixin';
import Message from '@gdbots/pbj/Message';
import PiiImpact from '@gdbots/schemas/gdbots/forms/enums/PiiImpact';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class YoutubeVideoFieldV1 extends Message {
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
      ],
      this.MIXINS,
    );
  }
}

const M = YoutubeVideoFieldV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:forms:field:youtube-video-field:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:forms:field:youtube-video-field';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:field:youtube-video-field:v1';
M.prototype.MIXINS = M.MIXINS = [
  'gdbots:forms:mixin:field:v1',
  'gdbots:forms:mixin:field',
];

GdbotsFormsFieldV1Mixin(M);

Object.freeze(M);
Object.freeze(M.prototype);
