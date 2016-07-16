# CHANGELOG


## v1.0.5
* Renames `pbj:gdbots:ncr:mixin:indexable:1-0-0` to `pbj:gdbots:ncr:mixin:indexed:1-0-0`.  No uses of this schema yet
  so we're fine to rename it.  Use of "able" suffix doesn't make sense when the feature isn't really an option.
* issue #11: Adds schemas for event store and search:
  * `pbj:gdbots:pbjx:mixin:indexed:1-0-0`
  * `pbj:gdbots:pbjx:mixin:search-events-request:1-0-0`
  * `pbj:gdbots:pbjx:mixin:search-events-response:1-0-0`
* Adds `Gdbots\Schemas\Pbjx\StreamId` identifier class for use in pbjx lib and available as identifer for schemas.
  Provides a standard for stream ids with `topic:partition:sub-partition` naming convention.
* Increase string length to 20 on `gdbots:contexts::app` version and variant.
* Added `gdbots:pbjx:mixin:indexed:v1` to `pbj:gdbots:pbjx:event:event-execution-failed:1-0-1`.


## v1.0.4
* Removes `stream_id` from all schemas.  Better to allow the application/infrastructure layer to figure out
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
