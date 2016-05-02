<?php

namespace Gdbots\Schemas\Pbjx\Mixin\Request;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class RequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:request:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('request_id', T\UuidType::create())
                ->required()
                ->build(),
            Fb::create('occurred_at', T\MicrotimeType::create())
                ->build(),
            /*
             * The "ctx_retries" field is used to keep track of how many attempts were
             * made to handle this request. In some cases, the service or transport
             * that handles the request may be down or over capacity and is being retried.
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
             * The "ctx_app" refers to the application used to make the request. This is
             * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
             * is not necessarily the app used (cms, iOS app, website)
             */
            Fb::create('ctx_app', T\MessageType::create())
                ->className('Gdbots\Schemas\Contexts\App')
                ->build(),
            /*
             * The "ctx_cloud" is set by the server making the request and is generally
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
