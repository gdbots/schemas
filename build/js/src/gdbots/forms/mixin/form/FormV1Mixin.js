// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/form/1-0-3.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import FileId from '@gdbots/schemas/gdbots/common/FileId';
import Format from '@gdbots/pbj/enums/Format';
import PiiImpact from '@gdbots/schemas/gdbots/forms/enums/PiiImpact';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class FormV1Mixin {
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
       * A short description (a few sentences) about this form. This field should
       * not have html as it is used in metadata.
       */
      Fb.create(this.DESCRIPTION_FIELD, T.TextType.create())
        .build(),
      Fb.create(this.THANK_YOU_HEADER_FIELD, T.StringType.create())
        .build(),
      /*
       * A short thank you message (a few sentences) a user will see after
       * they submit this form. This field should have little to no html
       * as it can be used in various contexts.
       */
      Fb.create(this.THANK_YOU_TEXT_FIELD, T.TextType.create())
        .build(),
      Fb.create(this.THANK_YOU_URL_FIELD, T.StringType.create())
        .format(Format.URL)
        .build(),
      Fb.create(this.TEMPLATE_FIELD, T.StringType.create())
        .format(Format.SLUG)
        .build(),
      /*
       * A map containing (HTML, JavaScript, CSS, etc.) that is injected into
       * a template at a named insertion point, e.g. "html_head" or "footer".
       */
      Fb.create(this.CUSTOM_CODE_FIELD, T.TextType.create())
        .asAMap()
        .build(),
      Fb.create(this.FIELDS_FIELD, T.MessageType.create())
        .asAList()
        .anyOfCuries([
          'gdbots:forms:mixin:field',
        ])
        .build(),
      Fb.create(this.HASHTAGS_FIELD, T.StringType.create())
        .asASet()
        .format(Format.HASHTAG)
        .build(),
      Fb.create(this.DISCLAIMER_FIELD, T.TextType.create())
        .build(),
      Fb.create(this.IMAGE_ID_FIELD, T.IdentifierType.create())
        .classProto(FileId)
        .build(),
      Fb.create(this.PII_IMPACT_FIELD, T.StringEnumType.create())
        .classProto(PiiImpact)
        .build(),
    ];
  }
}

const M = FormV1Mixin;
M.SCHEMA_ID = 'pbj:gdbots:forms:mixin:form:1-0-3';
M.SCHEMA_CURIE = 'gdbots:forms:mixin:form';
M.SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:form:v1';

M.DESCRIPTION_FIELD = 'description';
M.THANK_YOU_HEADER_FIELD = 'thank_you_header';
M.THANK_YOU_TEXT_FIELD = 'thank_you_text';
M.THANK_YOU_URL_FIELD = 'thank_you_url';
M.TEMPLATE_FIELD = 'template';
M.CUSTOM_CODE_FIELD = 'custom_code';
M.FIELDS_FIELD = 'fields';
M.HASHTAGS_FIELD = 'hashtags';
M.DISCLAIMER_FIELD = 'disclaimer';
M.IMAGE_ID_FIELD = 'image_id';
M.PII_IMPACT_FIELD = 'pii_impact';

M.FIELDS = [
  M.DESCRIPTION_FIELD,
  M.THANK_YOU_HEADER_FIELD,
  M.THANK_YOU_TEXT_FIELD,
  M.THANK_YOU_URL_FIELD,
  M.TEMPLATE_FIELD,
  M.CUSTOM_CODE_FIELD,
  M.FIELDS_FIELD,
  M.HASHTAGS_FIELD,
  M.DISCLAIMER_FIELD,
  M.IMAGE_ID_FIELD,
  M.PII_IMPACT_FIELD,
];
