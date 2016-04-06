<?php

namespace Gdbots\Schemas\Pbjx\Command;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class CommandV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:command:1-0-0');
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
            Fb::create('stream_id', T\IdentifierType::create())
                ->className('Gdbots\Schemas\Pbjx\StreamId')
                ->overridable(true)
                ->build(),
            Fb::create('command_id', T\TimeUuidType::create())
                ->required()
                ->build(),
            Fb::create('occurred_at', T\MicrotimeType::create())
                ->build(),
            /*
             * Used to perform optimistic concurrency control.
             * @link https://en.wikipedia.org/wiki/HTTP_ETag
             */
            Fb::create('expected_etag', T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build(),
            /*
             * The "ctx_retries" field is used to keep track of how many attempts were
             * made to process this command. In some cases, the service or transport
             * that handles the command may be down or an optimistic check has failed
             * and is being retried.
             */
            Fb::create('ctx_retries', T\TinyIntType::create())
                ->build(),
            Fb::create('ctx_causator_ref', T\MessageRefType::create())
                ->build(),
            Fb::create('ctx_correlator_ref', T\MessageRefType::create())
                ->build(),
            Fb::create('ctx_user_ref', T\MessageRefType::create())
                ->build(),
            /*
             * The "ctx_app" refers to the application used to send the command. This is
             * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
             * is not necessarily the app used (cms, iOS app, website)
             */
            Fb::create('ctx_app', T\MessageType::create())
                ->className('Gdbots\Schemas\Contexts\App')
                ->build(),
            /*
             * The "ctx_cloud" is set by the server receiving the command and is generally
             * only used internally for tracking and performance monitoring.
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
