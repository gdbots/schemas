<?php

namespace Gdbots\Schemas\Pbjx\Event;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class EventV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:event:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('event_id', T\TimeUuidType::create())
                ->required()
                ->build(),
            Fb::create('microtime', T\MicrotimeType::create())
                ->required()
                ->build(),
            Fb::create('causator', T\MessageRefType::create())
                ->build(),
            Fb::create('correlator', T\MessageRefType::create())
                ->build(),
        ];
    }
}
