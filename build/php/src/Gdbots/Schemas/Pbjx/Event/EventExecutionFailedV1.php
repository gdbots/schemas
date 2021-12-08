<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/event/event-execution-failed/1-0-1.json#
namespace Gdbots\Schemas\Pbjx\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;

final class EventExecutionFailedV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx:event:event-execution-failed:1-0-1';
    const SCHEMA_CURIE = 'gdbots:pbjx:event:event-execution-failed';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:event:event-execution-failed:v1';
    const MIXINS = [
      'gdbots:pbjx:mixin:event:v1',
      'gdbots:pbjx:mixin:event',
      'gdbots:pbjx:mixin:indexed:v1',
      'gdbots:pbjx:mixin:indexed',
    ];

    use GdbotsPbjxEventV1Mixin;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('event_id', T\TimeUuidType::create())
                    ->required()
                    ->build(),
                Fb::create('occurred_at', T\MicrotimeType::create())
                    ->build(),
                /*
                 * Multi-tenant apps can use this field to track the tenant id.
                 */
                Fb::create('ctx_tenant_id', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
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
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                /*
                 * The "ctx_cloud" is usually copied from the command that resulted in this
                 * event being published. This means the value most likely refers to the cloud
                 * that received the command originally, not the machine processing the event.
                 */
                Fb::create('ctx_cloud', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::cloud',
                    ])
                    ->build(),
                Fb::create('ctx_ip', T\StringType::create())
                    ->format(Format::IPV4)
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ipv6', T\StringType::create())
                    ->format(Format::IPV6)
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ua', T\TextType::create())
                    ->overridable(true)
                    ->build(),
                /*
                 * An optional message/reason for the event being created.
                 * Consider this like a git commit message.
                 */
                Fb::create('ctx_msg', T\TextType::create())
                    ->build(),
                Fb::create('event', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:pbjx:mixin:event',
                    ])
                    ->build(),
                Fb::create('error_code', T\SmallIntType::create())
                    ->withDefault(2)
                    ->build(),
                Fb::create('error_name', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('error_message', T\TextType::create())
                    ->build(),
                Fb::create('prev_error_message', T\TextType::create())
                    ->build(),
                Fb::create('stack_trace', T\TextType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
