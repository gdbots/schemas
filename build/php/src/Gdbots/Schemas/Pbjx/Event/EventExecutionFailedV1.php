<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/event/event-execution-failed/1-0-1.json#
namespace Gdbots\Schemas\Pbjx\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;

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

    const EVENT_ID_FIELD = 'event_id';
    const OCCURRED_AT_FIELD = 'occurred_at';
    const CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
    const CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
    const CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
    const CTX_USER_REF_FIELD = 'ctx_user_ref';
    const CTX_APP_FIELD = 'ctx_app';
    const CTX_CLOUD_FIELD = 'ctx_cloud';
    const CTX_IP_FIELD = 'ctx_ip';
    const CTX_IPV6_FIELD = 'ctx_ipv6';
    const CTX_UA_FIELD = 'ctx_ua';
    const CTX_MSG_FIELD = 'ctx_msg';
    const EVENT_FIELD = 'event';
    const ERROR_CODE_FIELD = 'error_code';
    const ERROR_NAME_FIELD = 'error_name';
    const ERROR_MESSAGE_FIELD = 'error_message';
    const PREV_ERROR_MESSAGE_FIELD = 'prev_error_message';
    const STACK_TRACE_FIELD = 'stack_trace';

    const FIELDS = [
      self::EVENT_ID_FIELD,
      self::OCCURRED_AT_FIELD,
      self::CTX_TENANT_ID_FIELD,
      self::CTX_CAUSATOR_REF_FIELD,
      self::CTX_CORRELATOR_REF_FIELD,
      self::CTX_USER_REF_FIELD,
      self::CTX_APP_FIELD,
      self::CTX_CLOUD_FIELD,
      self::CTX_IP_FIELD,
      self::CTX_IPV6_FIELD,
      self::CTX_UA_FIELD,
      self::CTX_MSG_FIELD,
      self::EVENT_FIELD,
      self::ERROR_CODE_FIELD,
      self::ERROR_NAME_FIELD,
      self::ERROR_MESSAGE_FIELD,
      self::PREV_ERROR_MESSAGE_FIELD,
      self::STACK_TRACE_FIELD,
    ];

    use GdbotsPbjxEventV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::EVENT_ID_FIELD, T\TimeUuidType::create())
                    ->required()
                    ->build(),
                Fb::create(self::OCCURRED_AT_FIELD, T\MicrotimeType::create())
                    ->build(),
                /*
                 * Multi-tenant apps can use this field to track the tenant id.
                 */
                Fb::create(self::CTX_TENANT_ID_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create(self::CTX_CAUSATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::CTX_CORRELATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::CTX_USER_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                /*
                 * The "ctx_app" refers to the application used to send the command which
                 * in turn resulted in this event being published.
                 */
                Fb::create(self::CTX_APP_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                /*
                 * The "ctx_cloud" is usually copied from the command that resulted in this
                 * event being published. This means the value most likely refers to the cloud
                 * that received the command originally, not the machine processing the event.
                 */
                Fb::create(self::CTX_CLOUD_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::cloud',
                    ])
                    ->build(),
                Fb::create(self::CTX_IP_FIELD, T\StringType::create())
                    ->format(Format::IPV4())
                    ->overridable(true)
                    ->build(),
                Fb::create(self::CTX_IPV6_FIELD, T\StringType::create())
                    ->format(Format::IPV6())
                    ->overridable(true)
                    ->build(),
                Fb::create(self::CTX_UA_FIELD, T\TextType::create())
                    ->overridable(true)
                    ->build(),
                /*
                 * An optional message/reason for the event being created.
                 * Consider this like a git commit message.
                 */
                Fb::create(self::CTX_MSG_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::EVENT_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:pbjx:mixin:event',
                    ])
                    ->build(),
                Fb::create(self::ERROR_CODE_FIELD, T\SmallIntType::create())
                    ->withDefault(2)
                    ->build(),
                Fb::create(self::ERROR_NAME_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create(self::ERROR_MESSAGE_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::PREV_ERROR_MESSAGE_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::STACK_TRACE_FIELD, T\TextType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
