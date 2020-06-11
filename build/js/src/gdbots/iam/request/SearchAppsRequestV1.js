// @link http://schemas.gdbots.io/json-schema/gdbots/iam/request/search-apps-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import Schema from '@gdbots/pbj/Schema';
import SearchAppsSort from '@gdbots/schemas/gdbots/iam/enums/SearchAppsSort';
import T from '@gdbots/pbj/types';

export default class SearchAppsRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.REQUEST_ID_FIELD, T.UuidType.create())
          .required()
          .build(),
        Fb.create(this.OCCURRED_AT_FIELD, T.MicrotimeType.create())
          .build(),
        /*
         * Multi-tenant apps can use this field to track the tenant id.
         */
        Fb.create(this.CTX_TENANT_ID_FIELD, T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        /*
         * The "ctx_retries" field is used to keep track of how many attempts were
         * made to handle this request. In some cases, the service or transport
         * that handles the request may be down or over capacity and is being retried.
         */
        Fb.create(this.CTX_RETRIES_FIELD, T.TinyIntType.create())
          .build(),
        Fb.create(this.CTX_CAUSATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.CTX_CORRELATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.CTX_USER_REF_FIELD, T.MessageRefType.create())
          .build(),
        /*
         * The "ctx_app" refers to the application used to make the request. This is
         * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
         * is not necessarily the app used (cms, iOS app, website)
         */
        Fb.create(this.CTX_APP_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::app',
          ])
          .build(),
        /*
         * The "ctx_cloud" is set by the server making the request and is generally
         * only used internally for tracking and performance monitoring.
         */
        Fb.create(this.CTX_CLOUD_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::cloud',
          ])
          .build(),
        Fb.create(this.CTX_IP_FIELD, T.StringType.create())
          .format(Format.IPV4)
          .overridable(true)
          .build(),
        Fb.create(this.CTX_IPV6_FIELD, T.StringType.create())
          .format(Format.IPV6)
          .overridable(true)
          .build(),
        Fb.create(this.CTX_UA_FIELD, T.TextType.create())
          .overridable(true)
          .build(),
        /*
         * Field names to dereference, this serves as a hint to the server and is not
         * necessarily gauranteed since authorization, availability, etc. are determined
         * by the server not the client.
         */
        Fb.create(this.DEREFS_FIELD, T.StringType.create())
          .asASet()
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.Q_FIELD, T.TextType.create())
          .maxLength(2000)
          .build(),
        /*
         * The number of results to return.
         */
        Fb.create(this.COUNT_FIELD, T.TinyIntType.create())
          .withDefault(25)
          .build(),
        Fb.create(this.PAGE_FIELD, T.TinyIntType.create())
          .min(1)
          .withDefault(1)
          .build(),
        Fb.create(this.AUTOCOMPLETE_FIELD, T.BooleanType.create())
          .build(),
        /*
         * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
         * When cursor is present it should be used instead of "page".
         */
        Fb.create(this.CURSOR_FIELD, T.StringType.create())
          .build(),
        /*
         * The status a node must be in to match the search request.
         */
        Fb.create(this.STATUS_FIELD, T.StringEnumType.create())
          .classProto(NodeStatus)
          .build(),
        /*
         * A set of statuses (node must match at least one) to include in the search results.
         */
        Fb.create(this.STATUSES_FIELD, T.StringEnumType.create())
          .asASet()
          .classProto(NodeStatus)
          .build(),
        Fb.create(this.CREATED_AFTER_FIELD, T.DateTimeType.create())
          .build(),
        Fb.create(this.CREATED_BEFORE_FIELD, T.DateTimeType.create())
          .build(),
        Fb.create(this.UPDATED_AFTER_FIELD, T.DateTimeType.create())
          .build(),
        Fb.create(this.UPDATED_BEFORE_FIELD, T.DateTimeType.create())
          .build(),
        Fb.create(this.PUBLISHED_AFTER_FIELD, T.DateTimeType.create())
          .build(),
        Fb.create(this.PUBLISHED_BEFORE_FIELD, T.DateTimeType.create())
          .build(),
        /*
         * The fields that are being queried as determined by parsing the "q" field.
         */
        Fb.create(this.FIELDS_USED_FIELD, T.StringType.create())
          .asASet()
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.PARSED_QUERY_JSON_FIELD, T.TextType.create())
          .build(),
        Fb.create(this.SORT_FIELD, T.StringEnumType.create())
          .withDefault(SearchAppsSort.TITLE_ASC)
          .classProto(SearchAppsSort)
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = SearchAppsRequestV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:gdbots:iam:request:search-apps-request:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'gdbots:iam:request:search-apps-request';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'gdbots:iam:request:search-apps-request:v1';

M.prototype.MIXINS = M.MIXINS = [
  'gdbots:pbjx:mixin:request:v1',
  'gdbots:pbjx:mixin:request',
  'gdbots:ncr:mixin:search-nodes-request:v1',
  'gdbots:ncr:mixin:search-nodes-request',
];

M.prototype.REQUEST_ID_FIELD = M.REQUEST_ID_FIELD = 'request_id';
M.prototype.OCCURRED_AT_FIELD = M.OCCURRED_AT_FIELD = 'occurred_at';
M.prototype.CTX_TENANT_ID_FIELD = M.CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
M.prototype.CTX_RETRIES_FIELD = M.CTX_RETRIES_FIELD = 'ctx_retries';
M.prototype.CTX_CAUSATOR_REF_FIELD = M.CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
M.prototype.CTX_CORRELATOR_REF_FIELD = M.CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
M.prototype.CTX_USER_REF_FIELD = M.CTX_USER_REF_FIELD = 'ctx_user_ref';
M.prototype.CTX_APP_FIELD = M.CTX_APP_FIELD = 'ctx_app';
M.prototype.CTX_CLOUD_FIELD = M.CTX_CLOUD_FIELD = 'ctx_cloud';
M.prototype.CTX_IP_FIELD = M.CTX_IP_FIELD = 'ctx_ip';
M.prototype.CTX_IPV6_FIELD = M.CTX_IPV6_FIELD = 'ctx_ipv6';
M.prototype.CTX_UA_FIELD = M.CTX_UA_FIELD = 'ctx_ua';
M.prototype.DEREFS_FIELD = M.DEREFS_FIELD = 'derefs';
M.prototype.Q_FIELD = M.Q_FIELD = 'q';
M.prototype.COUNT_FIELD = M.COUNT_FIELD = 'count';
M.prototype.PAGE_FIELD = M.PAGE_FIELD = 'page';
M.prototype.AUTOCOMPLETE_FIELD = M.AUTOCOMPLETE_FIELD = 'autocomplete';
M.prototype.CURSOR_FIELD = M.CURSOR_FIELD = 'cursor';
M.prototype.STATUS_FIELD = M.STATUS_FIELD = 'status';
M.prototype.STATUSES_FIELD = M.STATUSES_FIELD = 'statuses';
M.prototype.CREATED_AFTER_FIELD = M.CREATED_AFTER_FIELD = 'created_after';
M.prototype.CREATED_BEFORE_FIELD = M.CREATED_BEFORE_FIELD = 'created_before';
M.prototype.UPDATED_AFTER_FIELD = M.UPDATED_AFTER_FIELD = 'updated_after';
M.prototype.UPDATED_BEFORE_FIELD = M.UPDATED_BEFORE_FIELD = 'updated_before';
M.prototype.PUBLISHED_AFTER_FIELD = M.PUBLISHED_AFTER_FIELD = 'published_after';
M.prototype.PUBLISHED_BEFORE_FIELD = M.PUBLISHED_BEFORE_FIELD = 'published_before';
M.prototype.FIELDS_USED_FIELD = M.FIELDS_USED_FIELD = 'fields_used';
M.prototype.PARSED_QUERY_JSON_FIELD = M.PARSED_QUERY_JSON_FIELD = 'parsed_query_json';
M.prototype.SORT_FIELD = M.SORT_FIELD = 'sort';

M.prototype.FIELDS = M.FIELDS = [
  M.REQUEST_ID_FIELD,
  M.OCCURRED_AT_FIELD,
  M.CTX_TENANT_ID_FIELD,
  M.CTX_RETRIES_FIELD,
  M.CTX_CAUSATOR_REF_FIELD,
  M.CTX_CORRELATOR_REF_FIELD,
  M.CTX_USER_REF_FIELD,
  M.CTX_APP_FIELD,
  M.CTX_CLOUD_FIELD,
  M.CTX_IP_FIELD,
  M.CTX_IPV6_FIELD,
  M.CTX_UA_FIELD,
  M.DEREFS_FIELD,
  M.Q_FIELD,
  M.COUNT_FIELD,
  M.PAGE_FIELD,
  M.AUTOCOMPLETE_FIELD,
  M.CURSOR_FIELD,
  M.STATUS_FIELD,
  M.STATUSES_FIELD,
  M.CREATED_AFTER_FIELD,
  M.CREATED_BEFORE_FIELD,
  M.UPDATED_AFTER_FIELD,
  M.UPDATED_BEFORE_FIELD,
  M.PUBLISHED_AFTER_FIELD,
  M.PUBLISHED_BEFORE_FIELD,
  M.FIELDS_USED_FIELD,
  M.PARSED_QUERY_JSON_FIELD,
  M.SORT_FIELD,
];

GdbotsPbjxRequestV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
