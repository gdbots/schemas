<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/get-events-request/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Mixin\GetEventsRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\StreamId;

final class GetEventsRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:get-events-request:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('stream_id', T\IdentifierType::create())
                ->required()
                ->className(StreamId::class)
                ->build(),
            /*
             * Return events since this time (exclusive greater than if forward=true, less than if forward=false)
             */
            Fb::create('since', T\MicrotimeType::create())
                ->useTypeDefault(false)
                ->build(),
            /*
             * The number of events to return.
             */
            Fb::create('count', T\TinyIntType::create())
                ->withDefault(25)
                ->build(),
            /*
             * When true, the events are read from oldest to newest, otherwise newest to oldest.
             */
            Fb::create('forward', T\BooleanType::create())
                ->build(),
        ];
    }
}
