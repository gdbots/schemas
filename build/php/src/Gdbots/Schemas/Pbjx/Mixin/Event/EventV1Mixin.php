<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/event/1-0-1.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Event;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class EventV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:event:1-0-1';
    const SCHEMA_CURIE = 'gdbots:pbjx:mixin:event';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:event:v1';

    const EVENT_ID_FIELD = 'event_id';
    const OCCURRED_AT_FIELD = 'occurred_at';
    const CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
    const CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
    const CTX_USER_REF_FIELD = 'ctx_user_ref';
    const CTX_APP_FIELD = 'ctx_app';
    const CTX_CLOUD_FIELD = 'ctx_cloud';
    const CTX_IP_FIELD = 'ctx_ip';
    const CTX_IPV6_FIELD = 'ctx_ipv6';
    const CTX_UA_FIELD = 'ctx_ua';

    const FIELDS = [
      self::EVENT_ID_FIELD,
      self::OCCURRED_AT_FIELD,
      self::CTX_CAUSATOR_REF_FIELD,
      self::CTX_CORRELATOR_REF_FIELD,
      self::CTX_USER_REF_FIELD,
      self::CTX_APP_FIELD,
      self::CTX_CLOUD_FIELD,
      self::CTX_IP_FIELD,
      self::CTX_IPV6_FIELD,
      self::CTX_UA_FIELD,
    ];

    final private function __construct() {}

    public static function getId(): SchemaId
    {
        return SchemaId::fromString(self::SCHEMA_ID);
    }

    public static function hasField(string $name): bool
    {
        return in_array($name, self::FIELDS, true);
    }

    /**
     * @return Field[]
     */
    public static function getFields(): array
    {
        return [
            Fb::create(self::EVENT_ID_FIELD, T\TimeUuidType::create())
                ->required()
                ->build(),
            Fb::create(self::OCCURRED_AT_FIELD, T\MicrotimeType::create())
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
        ];
    }
}
