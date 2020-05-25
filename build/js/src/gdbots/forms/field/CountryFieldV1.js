// @link http://schemas.gdbots.io/json-schema/gdbots/forms/field/country-field/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsFormsFieldV1Trait from '@gdbots/schemas/gdbots/forms/mixin/field/FieldV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class CountryFieldV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:gdbots:forms:field:country-field:1-0-0', CountryFieldV1,
      [
        Fb.create('default_country', T.StringType.create())
          .pattern('^[A-Z]{2}$')
          .build(),
        Fb.create('preferred_countries', T.StringType.create())
          .asASet()
          .pattern('^[A-Z]{2}$')
          .build(),
        Fb.create('included_countries', T.StringType.create())
          .asASet()
          .pattern('^[A-Z]{2}$')
          .build(),
        Fb.create('excluded_countries', T.StringType.create())
          .asASet()
          .pattern('^[A-Z]{2}$')
          .build(),
      ],
      [
        GdbotsFormsFieldV1Mixin.create(),
      ],
    );
  }
}

GdbotsFormsFieldV1Trait(CountryFieldV1);
MessageResolver.register('gdbots:forms:field:country-field', CountryFieldV1);
Object.freeze(CountryFieldV1);
Object.freeze(CountryFieldV1.prototype);
