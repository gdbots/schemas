<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/event/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Event;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Contexts\App as GdbotsContextsApp;
use Gdbots\Schemas\Contexts\Cloud as GdbotsContextsCloud;

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
                ->anyOfClassNames([
                    GdbotsContextsApp::class,
                ])
                ->build(),
            /*
             * The "ctx_cloud" is usually copied from the command that resulted in this
             * event being published. This means the value most likely refers to the cloud
             * that received the command originally, not the machine processing the event.
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
