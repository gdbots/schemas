<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/request/1-0-2.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Request;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Contexts\App as GdbotsContextsApp;
use Gdbots\Schemas\Contexts\Cloud as GdbotsContextsCloud;

final class RequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:request:1-0-2');
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
                ->anyOfClassNames([
                    GdbotsContextsApp::class,
                ])
                ->build(),
            /*
             * The "ctx_cloud" is set by the server making the request and is generally
             * only used internally for tracking and performance monitoring.
             */
            Fb::create('ctx_cloud', T\MessageType::create())
                ->anyOfClassNames([
                    GdbotsContextsCloud::class,
                ])
                ->build(),
            Fb::create('ctx_ip', T\StringType::create())
                ->format(Format::IPV4())
                ->overridable(true)
                ->build(),
            Fb::create('ctx_ipv6', T\StringType::create())
                ->format(Format::IPV6())
                ->overridable(true)
                ->build(),
            Fb::create('ctx_ua', T\TextType::create())
                ->overridable(true)
                ->build(),
            /*
             * Field names to dereference, this serves as a hint to the server and is not
             * necessarily gauranteed since authorization, availability, etc. are determined
             * by the server not the client.
             */
            Fb::create('derefs', T\StringType::create())
                ->asASet()
                ->pattern('^[\w\.-]+$')
                ->build(),
        ];
    }
}
