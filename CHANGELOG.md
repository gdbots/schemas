# CHANGELOG


## v1.1.0
* issue #11: Added schemas for event store and search.
* Use `Gdbots\Pbj\WellKnown\*` classes for all types instead of the classes from `gdbots/common` lib.
* __New Schemas:__
  * `gdbots:analytics:comparison-operator`
  * `gdbots:analytics:interval`
  * `gdbots:analytics:mixin:tracked-message`
  * `gdbots:analytics:mixin:tracker`
  * `gdbots:analytics:stream-control`
  * `gdbots:analytics:tracker`
  * `gdbots:analytics:tracker:keen`
  * `gdbots:common:gender`
  * `gdbots:common:phone-type`
  * `gdbots:common:trinary`
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
* __Modified Schemas:__
  * `gdbots:geo::address` new version `1-0-1`
    * Added `verified` boolean field to indicate whether or not the address was checked.
  * `gdbots:pbjx:event:event-execution-failed` new version `1-0-1`
    * Added `gdbots:pbjx:mixin:indexed:v1` mixin so failures will be indexed and searchable.
  * `gdbots:contexts::app` version remains `1-0-0` due to no use in production yet.
    * Modified `version` field max increased from 10 to 20.
    * Modified `variant` field max increased from 10 to 20.
* Renamed `gdbots:ncr:mixin:indexable` to `gdbots:ncr:mixin:indexed`.  No uses of this schema yet
  so we're fine to rename it.  Use of "able" suffix doesn't make sense when the feature isn't really an option.
* Added `Gdbots\Schemas\Pbjx\StreamId` identifier class for use in pbjx lib and available as identifer for schemas.
  Provides a standard for stream ids with `topic:partition:sub-partition` naming convention.


## v1.0.4
* Removed `stream_id` from all schemas.  Better to allow the application/infrastructure layer to figure out
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
