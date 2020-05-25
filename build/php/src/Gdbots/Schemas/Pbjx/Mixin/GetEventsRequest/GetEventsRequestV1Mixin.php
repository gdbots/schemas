<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/get-events-request/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Mixin\GetEventsRequest;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\StreamId;

final class GetEventsRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:get-events-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:pbjx:mixin:get-events-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:get-events-request:v1';

    const STREAM_ID_FIELD = 'stream_id';
    const SINCE_FIELD = 'since';
    const COUNT_FIELD = 'count';
    const FORWARD_FIELD = 'forward';

    const FIELDS = [
      self::STREAM_ID_FIELD,
      self::SINCE_FIELD,
      self::COUNT_FIELD,
      self::FORWARD_FIELD,
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
            Fb::create(self::STREAM_ID_FIELD, T\IdentifierType::create())
                ->required()
                ->className(StreamId::class)
                ->build(),
            /*
             * Return events since this time (exclusive greater than if forward=true, less than if forward=false)
             */
            Fb::create(self::SINCE_FIELD, T\MicrotimeType::create())
                ->useTypeDefault(false)
                ->build(),
            /*
             * The number of events to return.
             */
            Fb::create(self::COUNT_FIELD, T\TinyIntType::create())
                ->withDefault(25)
                ->build(),
            /*
             * When true, the events are read from oldest to newest, otherwise newest to oldest.
             */
            Fb::create(self::FORWARD_FIELD, T\BooleanType::create())
                ->build(),
        ];
    }
}
