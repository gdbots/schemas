<?php

namespace Gdbots\Schemas\Pbjx\Mixin\GetEventsResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class GetEventsResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:get-events-response:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('has_more', T\BooleanType::create())
                ->build(),
            /*
             * The last "occurred_at" value from the last event in the "events" list. This can be
             * used as "since" when requesting the next set of events if "has_more" is true.
             */
            Fb::create('last_occurred_at', T\MicrotimeType::create())
                ->useTypeDefault(false)
                ->build(),
            Fb::create('events', T\MessageType::create())
                ->asAList()
                ->className('Gdbots\Schemas\Pbjx\Mixin\Event\Event')
                ->build()
        ];
    }
}
