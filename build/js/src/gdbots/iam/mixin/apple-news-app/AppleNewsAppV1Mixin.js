// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/apple-news-app/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AppleNewsAppV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:gdbots:iam:mixin:apple-news-app:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      Fb.create('api_key', T.StringType.create())
        .pattern('^[a-z0-9-]+$')
        .build(),
      Fb.create('api_secret', T.StringType.create())
        .build(),
      Fb.create('channel_id', T.StringType.create())
        .pattern('^[a-z0-9-]+$')
        .build(),
    ];
  }
}
