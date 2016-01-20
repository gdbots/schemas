<?php
/*
 * Registers the directory containing pbj schemas with the SchemaStore.
 * This should only be run in "autoload-dev" section of composer.
 */
\Gdbots\Pbjc\SchemaStore::addDir(__DIR__.'/schemas/');
