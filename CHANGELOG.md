# CHANGELOG


## v1.2.0

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
* PHP 7.1 is now required.  All other project dependencies already have this requirement, e.g. __gdbots/pbjx__.
* Add es6 compiling. PHP compiled files are moved but unchanged (except for minor improvements) and composer 
  autoload config is updated so no changes are required if using php.
* __Modify Schemas:__
  * `gdbots:pbjx::envelope` new version `1-0-1`
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
  * `gdbots:geo::address` new version `1-0-1`
    * Add `verified` boolean field to indicate whether or not the address was checked.
  * `gdbots:pbjx:event:event-execution-failed` new version `1-0-1`
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
