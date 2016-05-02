<?php

namespace Gdbots\Schemas\Pbjx\Mixin\Event;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
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
            /*
             * The "stream_id" can be used to provide sequential ordering of messages.
             * It is still up to the transports and consumers to handle the ordering and
             * the sequence can only be reliable within the stream_id.
             */
            Fb::create('stream_id', T\StringType::create())
                ->pattern('^[\w\/\.:#@-]+$')
                ->build(),
            Fb::create('event_id', T\TimeUuidType::create())
                ->required()
                ->build(),
            Fb::create('occurred_at', T\MicrotimeType::create())
                ->build(),
            Fb::create('ctx_causator_ref', T\MessageRefType::create())
                ->build(),
            Fb::create('ctx_correlator_ref', T\MessageRefType::create())
                ->build(),
            Fb::create('ctx_user_ref', T\MessageRefType::create())
                ->build(),
            /*
             * The "ctx_app" refers to the application used to send the command which
             * in turn resulted in this event being published.
             */
            Fb::create('ctx_app', T\MessageType::create())
                ->className('Gdbots\Schemas\Contexts\App')
                ->build(),
            /*
             * The "ctx_cloud" is usually copied from the command that resulted in this
             * event being published. This means the value most likely refers to the cloud
             * that received the command originally, not the machine processing the event.
             */
            Fb::create('ctx_cloud', T\MessageType::create())
                ->className('Gdbots\Schemas\Contexts\Cloud')
                ->build(),
            Fb::create('ctx_ip', T\StringType::create())
                ->format(Format::IPV4())
                ->overridable(true)
                ->build(),
            Fb::create('ctx_ua', T\TextType::create())
                ->overridable(true)
                ->build()
        ];
    }
}
