<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/get-events-response/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Mixin\GetEventsResponse;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class GetEventsResponseV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:get-events-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:pbjx:mixin:get-events-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:get-events-response:v1';

    const HAS_MORE_FIELD = 'has_more';
    const LAST_OCCURRED_AT_FIELD = 'last_occurred_at';
    const EVENTS_FIELD = 'events';

    const FIELDS = [
      self::HAS_MORE_FIELD,
      self::LAST_OCCURRED_AT_FIELD,
      self::EVENTS_FIELD,
    ];

    final private function __construct() {}

    public static function getId(): SchemaId
    {
        return SchemaId::fromString(self::SCHEMA_ID);
    }

    public static function hasField(string $name): bool
    {
        return in_array($name, self::FIELDS, true);
    }

    /**
     * @return Field[]
     */
    public static function getFields(): array
    {
        return [
            Fb::create(self::HAS_MORE_FIELD, T\BooleanType::create())
                ->build(),
            /*
             * The last "occurred_at" value from the last event in the "events" list. This can be
             * used as "since" when requesting the next set of events if "has_more" is true.
             */
            Fb::create(self::LAST_OCCURRED_AT_FIELD, T\MicrotimeType::create())
                ->useTypeDefault(false)
                ->build(),
            Fb::create(self::EVENTS_FIELD, T\MessageType::create())
                ->asAList()
                ->anyOfCuries([
                    'gdbots:pbjx:mixin:event',
                ])
                ->overridable(true)
                ->build(),
        ];
    }
}
