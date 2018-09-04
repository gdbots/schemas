<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/command/1-0-1.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Command;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Contexts\App as GdbotsContextsApp;
use Gdbots\Schemas\Contexts\Cloud as GdbotsContextsCloud;

final class CommandV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:command:1-0-1');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
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
            /*
             * The "ctx_causator" is the actual causator object that "ctx_causator_ref"
             * refers to. In some cases it's useful for command handlers to copy the
             * causator into the command. For example, when a node is being updated we
             * may want to know what the node will be after the update. We can derive
             * this via the causator instead of requesting the node and engaging a race
             * condition.
             */
            Fb::create('ctx_causator', T\MessageType::create())
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
                ->anyOfClassNames([
                    GdbotsContextsApp::class,
                ])
                ->build(),
            /*
             * The "ctx_cloud" is set by the server receiving the command and is generally
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
            Fb::create('ctx_ua', T\TextType::create())
                ->overridable(true)
                ->build(),
        ];
    }
}
