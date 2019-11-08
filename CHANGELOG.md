# CHANGELOG


## v1.6.2
* __Modify Schemas:__
  * `gdbots:ncr:mixin:get-node-request` patch revision `1-0-2`
    * Remove `derefs` field since it's now in the `gdbots:pbjx:mixin:request` which this message extends.


## v1.6.1
* __Modify Schemas:__
  * `gdbots:ncr:mixin:get-node-batch-request` patch revision `1-0-2`
    * Remove `derefs` field since it's now in the `gdbots:pbjx:mixin:request` which this message extends.
  * `gdbots:ncr:mixin:node-updated` patch revision `1-0-1`
    * Add `paths` string set field with pattern `^[a-zA-Z_]{1}[\w\.]*$`.
  * `gdbots:ncr:mixin:search-nodes-request` patch revision `1-0-3`
    * Add `autocomplete` boolean field.
    * Remove `derefs` field since it's now in the `gdbots:pbjx:mixin:request` which this message extends.
  * `gdbots:ncr:mixin:update-node` patch revision `1-0-1`
    * Add `paths` string set field with pattern `^[a-zA-Z_]{1}[\w\.]*$`.
  * `gdbots:pbjx:mixin:request` patch revision `1-0-2`
    * Add `derefs` string set field with pattern `^[\w\.-]+$`.
  * `gdbots:pbjx:mixin:response` patch revision `1-0-1`
    * Add `derefs` message map field for including (aka eager fetching).
    * Add `links` text map field.
    * Add `metas` text map field.


## v1.6.0
* __Modify Schemas:__
  * `gdbots:pbjx::envelope` minor revision `1-1-0`
    * Add `metas` text map field.
    * Remove format url from `links` text map field.  Need to allow for uri templates which contain `{}`.


## v1.5.13
* __Modify Schemas:__
  * `gdbots:iam:mixin:android-app` patch revision `1-0-3`
    * Add `fcm_project_id` string field with format slug.
    * Add `fcm_sender_id` string field with pattern `^\d+$`.
    * Add `fcm_web_api_key` string field with pattern `^[\w\.-]+$`.
  * `gdbots:iam:mixin:browser-app` patch revision `1-0-1`
    * Add `fcm_api_key` text field.
    * Add `fcm_project_id` string field with format slug.
    * Add `fcm_sender_id` string field with pattern `^\d+$`.
    * Add `fcm_web_api_key` string field with pattern `^[\w\.-]+$`.
  * `gdbots:iam:mixin:ios-app` patch revision `1-0-3`
    * Add `fcm_project_id` string field with format slug.
    * Add `fcm_sender_id` string field with pattern `^\d+$`.
    * Add `fcm_web_api_key` string field with pattern `^[\w\.-]+$`.
  * `gdbots:ncr:mixin:get-node-batch-request` patch revision `1-0-1`
    * Add `derefs` string set field with pattern `^[\w\.-]+$`.
  * `gdbots:ncr:mixin:get-node-request` patch revision `1-0-1`
    * Add `derefs` string set field with pattern `^[\w\.-]+$`.
  * `gdbots:ncr:mixin:search-nodes-request` patch revision `1-0-2`
    * Add `published_after` date-time field.
    * Add `published_before` date-time field.
    * Add `derefs` string set field with pattern `^[\w\.-]+$`.


## v1.5.12
__Modify Schemas:__
  * `gdbots:enrichments:mixin:ip-to-geo` patch revision `1-0-1`
    * Add `ctx_ipv6` string field with format ipv6.
  * `gdbots:pbjx:mixin:command` patch revision `1-0-2`
    * Add `ctx_ipv6` string field with format ipv6.
  * `gdbots:pbjx:mixin:event` patch revision `1-0-1`
    * Add `ctx_ipv6` string field with format ipv6.


## v1.5.11
* __Modify Schemas:__
  * `gdbots:iam:mixin:android-app` patch revision `1-0-2`
    * Add `fcm_api_key` text field.
  * `gdbots:iam:mixin:ios-app` patch revision `1-0-2`
    * Add `fcm_api_key` text field.
  * `gdbots:pbjx::envelope` patch revision `1-0-2`
    * Add `links` text map field with format url.


## v1.5.10
* Use `DateTimeInterface` in `FileId` for php language.
* Use `gdbots/pbjc` v0.4.0 with optimized manifest for php.


## v1.5.9
* Allow StreamId to be up to 255 chars.


## v1.5.8
* __Modify Schemas:__
  * `gdbots:iam:mixin:android-app` patch revision `1-0-1`
    * Add `azure_notification_hub_connection` text field.
    * Add `azure_notification_hub_name` string field with pattern `^[\w-]+$`.
  * `gdbots:iam:mixin:ios-app` patch revision `1-0-1`
    * Add `azure_notification_hub_connection` text field.
    * Add `azure_notification_hub_name` string field with pattern `^[\w-]+$`.


## v1.5.7
* __Modify Schemas:__
  * `gdbots:iam:mixin:email-app` patch revision `1-0-2`
    * Add `sendgrid_lists` int map field.
    * Add `sendgrid_senders` int map field. 
    * Add `sendgrid_suppression_group_id` int field.


## v1.5.6
* __Modify Schemas:__
  * `gdbots:pbjx:mixin:command` patch revision `1-0-1`
    * Add `ctx_causator` message field.


## v1.5.5
* __Modify Schemas:__
  * `gdbots:iam:mixin:apple-news-app` patch revision `1-0-1`
    * Add `channel_id` string field with pattern `^[\w-]+$`.
    * Add `api_key` string field with pattern `^[\w-]+$`.
    * Add `api_secret` text field.
  * `gdbots:iam:mixin:email-app` patch revision `1-0-1`
    * Add `sendgrid_api_key` text field.


## v1.5.4
* __Add Schemas:__
  * `gdbots:iam:mixin:email-app`


## v1.5.3
* __Add Schemas:__
  * `gdbots:iam:mixin:get-all-apps-request`
  * `gdbots:iam:mixin:get-all-apps-response`
* __Delete Schemas:__ _(we actually need the full node, not just node ref so changed message, no use in any known universe so deleting)
  * `gdbots:iam:mixin:list-all-apps-request`
  * `gdbots:iam:mixin:list-all-apps-response`


## v1.5.2
* __Add Schemas:__
  * `gdbots:iam:mixin:alexa-app`
  * `gdbots:iam:mixin:android-app`
  * `gdbots:iam:mixin:app`
  * `gdbots:iam:mixin:app-roles-granted`
  * `gdbots:iam:mixin:app-roles-revoked`
  * `gdbots:iam:mixin:apple-news-app`
  * `gdbots:iam:mixin:browser-app`
  * `gdbots:iam:mixin:grant-roles-to-app`
  * `gdbots:iam:mixin:ios-app`
  * `gdbots:iam:mixin:list-all-apps-request`
  * `gdbots:iam:mixin:list-all-apps-response`
  * `gdbots:iam:mixin:revoke-roles-from-app`
  * `gdbots:iam:mixin:slack-app`
  * `gdbots:iam:mixin:sms-app`


## v1.5.1
* __Add Schemas:__
  * `gdbots:forms:field:skype-user-field`
  * `gdbots:ncr:mixin:node-patched`
  * `gdbots:ncr:mixin:patch-node`
  * `gdbots:ncr:mixin:patch-nodes`
* __Modify Schemas:__
  * `gdbots:forms:field:select-field` patch revision `1-0-1`
    * Add `allow_other` boolean field.


## v1.5.0
__POSSIBLE BREAKING CHANGES__

Any apps using the mixins/marker interfaces for Ncr crud-like operations (e.g. `gdbots:forms:mixin:create-form`) should now use your own concrete messages or the abstract schemas provided by `gdbots:ncr:mixin:*`.  Having the additional layer was useful type hints in php and the message resolution but not worth the added code for javascript applications (even with bundling).  Libraries can use convention based resolution in its place, ref `triniti/news-php` for an example.
* __Delete Schemas:__
  * `gdbots:forms:mixin:create-form`
  * `gdbots:forms:mixin:delete-form`
  * `gdbots:forms:mixin:expire-form`
  * `gdbots:forms:mixin:form-created`
  * `gdbots:forms:mixin:form-deleted`
  * `gdbots:forms:mixin:form-expired`
  * `gdbots:forms:mixin:form-published`
  * `gdbots:forms:mixin:form-scheduled`
  * `gdbots:forms:mixin:form-unpublished`
  * `gdbots:forms:mixin:form-updated`
  * `gdbots:forms:mixin:get-form-batch-request`
  * `gdbots:forms:mixin:get-form-batch-response`
  * `gdbots:forms:mixin:get-form-history-request`
  * `gdbots:forms:mixin:get-form-history-response`
  * `gdbots:forms:mixin:get-form-request`
  * `gdbots:forms:mixin:get-form-response`
  * `gdbots:forms:mixin:publish-form`
  * `gdbots:forms:mixin:unpublish-form`
  * `gdbots:forms:mixin:update-form`
  * `gdbots:iam:mixin:create-role`
  * `gdbots:iam:mixin:create-user`
  * `gdbots:iam:mixin:delete-role`
  * `gdbots:iam:mixin:delete-user`
  * `gdbots:iam:mixin:get-role-batch-request`
  * `gdbots:iam:mixin:get-role-batch-response`
  * `gdbots:iam:mixin:get-role-history-request`
  * `gdbots:iam:mixin:get-role-history-response`
  * `gdbots:iam:mixin:get-role-request`
  * `gdbots:iam:mixin:get-role-response`
  * `gdbots:iam:mixin:get-user-batch-request`
  * `gdbots:iam:mixin:get-user-batch-response`
  * `gdbots:iam:mixin:get-user-history-request`
  * `gdbots:iam:mixin:get-user-history-response`
  * `gdbots:iam:mixin:role-created`
  * `gdbots:iam:mixin:role-deleted`
  * `gdbots:iam:mixin:role-updated`
  * `gdbots:iam:mixin:update-role`
  * `gdbots:iam:mixin:update-user`
  * `gdbots:iam:mixin:user-created`
  * `gdbots:iam:mixin:user-deleted`
  * `gdbots:iam:mixin:user-updated`
* __Modify Schemas:__
  * `gdbots:forms:field:yes-no-field` patch revision `1-0-2`
    * Add `is_consent` boolean field.
  * `gdbots:forms:mixin:form` patch revision `1-0-2`
    * Add `thank_you_header` string field.
    * Add `thank_you_text` text field.
    * Add `thank_you_url` string field with url format.
  * `gdbots:iam:mixin:user` patch revision `1-0-1`
    * Redefine `_id` field and use UserId identifier.  Same type of identifier as previous version.


## v1.4.4
* __Add Schemas:__
  * `gdbots:common:sexual-orientation`
  * `gdbots:forms:field:sexual-orientation-field`
* __Modify Schemas:__
  * `gdbots:geo::address` patch revision `1-0-2`
    * Add `county` string field.


## v1.4.3
* __Add Schemas:__
  * `gdbots:ncr:mixin:lock-node`
  * `gdbots:ncr:mixin:lockable`
  * `gdbots:ncr:mixin:node-locked`
  * `gdbots:ncr:mixin:node-unlocked`
  * `gdbots:ncr:mixin:unlock-node`


## v1.4.2
* Change all `getUriTemplateVars` methods to use field name in returned object rather than some using a different name.  For example, returning `user_id` on user object instead of `_id` which is the actual field.
* __Modify Schemas:__
  * `gdbots:ncr:mixin:search-nodes-request` patch revision `1-0-1`
    * Add `statuses` string-enum set field using enum `gdbots:ncr:node-status`.


## v1.4.1
* Change composer version constraint for `gdbots/pbj` to `~1.1|~2.0`.
* __Add Schemas:__
  * `gdbots:forms:pii-impact`
  * `gdbots:ncr:mixin:mark-node-as-draft`
  * `gdbots:ncr:mixin:mark-node-as-pending`
  * `gdbots:ncr:mixin:node-marked-as-draft`
  * `gdbots:ncr:mixin:node-marked-as-pending`
* __Modify Schemas:__
  * `gdbots:forms:mixin:field` patch revision `1-0-2`
    * Add `pii_impact` string-enum field using enum `gdbots:forms:pii-impact`.
  * `gdbots:forms:mixin:form` patch revision `1-0-1`
    * Add `pii_impact` string-enum field using enum `gdbots:forms:pii-impact`.
  * Add new options to enum `gdbots:ncr:node-status`
    * `<option key="PENDING" value="pending"/>`
    * `<option key="ARCHIVED" value="archived"/>`


## v1.4.0
* Change `FileId::toFilePath` method to move the shard after the type to eliminate S3 rate limiting.
* __Modify Schemas:__
  * `gdbots:forms:mixin:field` patch revision `1-0-1`
    * Add `link_text` string field which will be used to replace a token `{link}`
      within a field label or description.
    * Add `link_url` string field with URL format which will be used for the URL of
      the replaced token `{link}` within a field label or description.


## v1.3.0
* issue #16: Add schemas for the form services.
* __Add Schemas:__
  * `gdbots:forms:field:address-field`
  * `gdbots:forms:field:age-field`
  * `gdbots:forms:field:country-field`
  * `gdbots:forms:field:date-field`
  * `gdbots:forms:field:dob-field`
  * `gdbots:forms:field:email-field`
  * `gdbots:forms:field:facebook-user-field`
  * `gdbots:forms:field:gender-field`
  * `gdbots:forms:field:height-field`
  * `gdbots:forms:field:instagram-user-field`
  * `gdbots:forms:field:legal-field`
  * `gdbots:forms:field:long-text-field`
  * `gdbots:forms:field:number-field`
  * `gdbots:forms:field:phone-field`
  * `gdbots:forms:field:photo-field`
  * `gdbots:forms:field:pinterest-user-field`
  * `gdbots:forms:field:select-field`
  * `gdbots:forms:field:short-text-field`
  * `gdbots:forms:field:snapchat-user-field`
  * `gdbots:forms:field:statement-field`
  * `gdbots:forms:field:twitter-user-field`
  * `gdbots:forms:field:video-field`
  * `gdbots:forms:field:website-field`
  * `gdbots:forms:field:yes-no-field`
  * `gdbots:forms:field:youtube-user-field`
  * `gdbots:forms:field:youtube-video-field`
  * `gdbots:forms:mixin:create-form`
  * `gdbots:forms:mixin:delete-form`
  * `gdbots:forms:mixin:expire-form`
  * `gdbots:forms:mixin:field`
  * `gdbots:forms:mixin:form`
  * `gdbots:forms:mixin:form-created`
  * `gdbots:forms:mixin:form-deleted`
  * `gdbots:forms:mixin:form-expired`
  * `gdbots:forms:mixin:form-published`
  * `gdbots:forms:mixin:form-scheduled`
  * `gdbots:forms:mixin:form-unpublished`
  * `gdbots:forms:mixin:form-updated`
  * `gdbots:forms:mixin:get-form-batch-request`
  * `gdbots:forms:mixin:get-form-batch-response`
  * `gdbots:forms:mixin:get-form-history-request`
  * `gdbots:forms:mixin:get-form-history-response`
  * `gdbots:forms:mixin:get-form-request`
  * `gdbots:forms:mixin:get-form-response`
  * `gdbots:forms:mixin:publish-form`
  * `gdbots:forms:mixin:search-forms-request`
  * `gdbots:forms:mixin:search-forms-response`
  * `gdbots:forms:mixin:send-submission`
  * `gdbots:forms:mixin:unpublish-form`
  * `gdbots:forms:mixin:update-form`


## v1.2.0
* PHP 7.1 is now required.  All other project dependencies already have this requirement, e.g. __gdbots/pbjx__.
* Add es6 compiling. PHP compiled files are moved but unchanged (except for minor improvements) and composer
  autoload config is updated so no changes are required if using php.
* __Modify Schemas:__
  * `gdbots:pbjx::envelope` patch revision `1-0-1`
    * Add `derefs` message map field for including (aka eager fetching) messages
      into the envelope to prevent needing to do multiple HTTP requests.


## v1.1.1
* issue #14: BUG :: Ensure use statements of mixins are scoped/unique.  No schema changes, just php improvements
  that ensure there will be no collisions of php class names when mixins/classes have the same name.


## v1.1.0
* issue #11: Add schemas for event store and search.
* Use `Gdbots\Pbj\WellKnown\*` classes for all types instead of the classes from `gdbots/common` lib.
* __Add Schemas:__
  * `gdbots:analytics:comparison-operator`
  * `gdbots:analytics:interval`
  * `gdbots:analytics:mixin:tracked-message`
  * `gdbots:analytics:mixin:tracker`
  * `gdbots:analytics:stream-control`
  * `gdbots:analytics:tracker`
  * `gdbots:analytics:tracker:keen`
  * `gdbots:common:gender`
  * `gdbots:common:mixin:taggable`
  * `gdbots:common:phone-type`
  * `gdbots:common:trinary`
  * `gdbots:iam:mixin:create-role`
  * `gdbots:iam:mixin:create-user`
  * `gdbots:iam:mixin:delete-role`
  * `gdbots:iam:mixin:delete-user`
  * `gdbots:iam:mixin:get-role-batch-request`
  * `gdbots:iam:mixin:get-role-batch-response`
  * `gdbots:iam:mixin:get-role-history-request`
  * `gdbots:iam:mixin:get-role-history-response`
  * `gdbots:iam:mixin:get-role-request`
  * `gdbots:iam:mixin:get-role-response`
  * `gdbots:iam:mixin:get-user-batch-request`
  * `gdbots:iam:mixin:get-user-batch-response`
  * `gdbots:iam:mixin:get-user-history-request`
  * `gdbots:iam:mixin:get-user-history-response`
  * `gdbots:iam:mixin:get-user-request`
  * `gdbots:iam:mixin:get-user-response`
  * `gdbots:iam:mixin:grant-roles-to-user`
  * `gdbots:iam:mixin:list-all-roles-request`
  * `gdbots:iam:mixin:list-all-roles-response`
  * `gdbots:iam:mixin:revoke-roles-from-user`
  * `gdbots:iam:mixin:role`
  * `gdbots:iam:mixin:role-created`
  * `gdbots:iam:mixin:role-deleted`
  * `gdbots:iam:mixin:role-updated`
  * `gdbots:iam:mixin:search-users-request`
  * `gdbots:iam:mixin:search-users-response`
  * `gdbots:iam:mixin:update-role`
  * `gdbots:iam:mixin:update-user`
  * `gdbots:iam:mixin:user`
  * `gdbots:iam:mixin:user-created`
  * `gdbots:iam:mixin:user-deleted`
  * `gdbots:iam:mixin:user-roles-granted`
  * `gdbots:iam:mixin:user-roles-revoked`
  * `gdbots:iam:mixin:user-updated`
  * `gdbots:iam:search-users-sort`
  * `gdbots:ncr:mixin:search-nodes-request`
  * `gdbots:ncr:mixin:search-nodes-response`
  * `gdbots:pbjx:command:check-health`
  * `gdbots:pbjx:event:health-checked`
  * `gdbots:pbjx:mixin:get-events-request`
  * `gdbots:pbjx:mixin:get-events-response`
  * `gdbots:pbjx:mixin:indexed`
  * `gdbots:pbjx:mixin:search-events-request`
  * `gdbots:pbjx:mixin:search-events-response`
  * `gdbots:pbjx:request:echo-request`
  * `gdbots:pbjx:request:echo-response`
  * `gdbots:pbjx:search-events-sort`
* __Modify Schemas:__
  * `gdbots:geo::address` patch revision `1-0-1`
    * Add `verified` boolean field to indicate whether or not the address was checked.
  * `gdbots:pbjx:event:event-execution-failed` patch revision `1-0-1`
    * Add `gdbots:pbjx:mixin:indexed:v1` mixin so failures will be indexed and searchable.
  * `gdbots:contexts::app` version remains `1-0-0` due to no use in production yet.
    * Modify `version` field max increased from 10 to 20.
    * Modify `variant` field max increased from 10 to 20.
* Rename `gdbots:ncr:mixin:indexable` to `gdbots:ncr:mixin:indexed`.  No uses of this schema yet
  so we're fine to rename it.  Use of "able" suffix doesn't make sense when the feature isn't really an option.
* Add `Gdbots\Schemas\Pbjx\StreamId` identifier class for use in pbjx lib and available as identifer for schemas.
  Provides a standard for stream ids with `topic:partition:sub-partition` naming convention.


## v1.0.4
* Remove `stream_id` from all schemas.  Better to allow the application/infrastructure layer to figure out
  what streams to put messages on.  Also allows for linking messages to multiple streams.
  Version not incremented due to nothing being in production with this library yet (should have started with 0.x - doh)


## v1.0.3
* Allow all `stream_id` fields to contain `#` or `@` signs as well.  Schema is the same but pattern modified.
  Version not incremented due to nothing being in production with this library yet.


## v1.0.2
* Recompile with gdbots/pbjc v0.1.6 to get overridable bug fix.  No actual schema changes made.


## v1.0.1
* Recompile with gdbots/pbjc v0.1.5 to get json schema fixes.  No actual schema changes made.


## v1.0.0
* Initial version.
