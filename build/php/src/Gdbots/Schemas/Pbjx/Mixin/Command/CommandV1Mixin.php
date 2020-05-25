<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/command/1-0-2.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Command;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class CommandV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:pbjx:mixin:command:1-0-2';
    const SCHEMA_CURIE = 'gdbots:pbjx:mixin:command';
    const SCHEMA_CURIE_MAJOR = 'gdbots:pbjx:mixin:command:v1';

    const COMMAND_ID_FIELD = 'command_id';
    const OCCURRED_AT_FIELD = 'occurred_at';
    const EXPECTED_ETAG_FIELD = 'expected_etag';
    const CTX_RETRIES_FIELD = 'ctx_retries';
    const CTX_CAUSATOR_FIELD = 'ctx_causator';
    const CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
    const CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
    const CTX_USER_REF_FIELD = 'ctx_user_ref';
    const CTX_APP_FIELD = 'ctx_app';
    const CTX_CLOUD_FIELD = 'ctx_cloud';
    const CTX_IP_FIELD = 'ctx_ip';
    const CTX_IPV6_FIELD = 'ctx_ipv6';
    const CTX_UA_FIELD = 'ctx_ua';

    const FIELDS = [
      self::COMMAND_ID_FIELD,
      self::OCCURRED_AT_FIELD,
      self::EXPECTED_ETAG_FIELD,
      self::CTX_RETRIES_FIELD,
      self::CTX_CAUSATOR_FIELD,
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
            Fb::create(self::COMMAND_ID_FIELD, T\TimeUuidType::create())
                ->required()
                ->build(),
            Fb::create(self::OCCURRED_AT_FIELD, T\MicrotimeType::create())
                ->build(),
            /*
             * Used to perform optimistic concurrency control.
             * @link https://en.wikipedia.org/wiki/HTTP_ETag
             */
            Fb::create(self::EXPECTED_ETAG_FIELD, T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build(),
            /*
             * The "ctx_retries" field is used to keep track of how many attempts were
             * made to process this command. In some cases, the service or transport
             * that handles the command may be down or an optimistic check has failed
             * and is being retried.
             */
            Fb::create(self::CTX_RETRIES_FIELD, T\TinyIntType::create())
                ->build(),
            /*
             * The "ctx_causator" is the actual causator object that "ctx_causator_ref"
             * refers to. In some cases it's useful for command handlers to copy the
             * causator into the command. For example, when a node is being updated we
             * may want to know what the node will be after the update. We can derive
             * this via the causator instead of requesting the node and engaging a race
             * condition.
             */
            Fb::create(self::CTX_CAUSATOR_FIELD, T\MessageType::create())
                ->build(),
            Fb::create(self::CTX_CAUSATOR_REF_FIELD, T\MessageRefType::create())
                ->build(),
            Fb::create(self::CTX_CORRELATOR_REF_FIELD, T\MessageRefType::create())
                ->build(),
            Fb::create(self::CTX_USER_REF_FIELD, T\MessageRefType::create())
                ->build(),
            /*
             * The "ctx_app" refers to the application used to send the command. This is
             * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
             * is not necessarily the app used (cms, iOS app, website)
             */
            Fb::create(self::CTX_APP_FIELD, T\MessageType::create())
                ->anyOfCuries([
                    'gdbots:contexts::app',
                ])
                ->build(),
            /*
             * The "ctx_cloud" is set by the server receiving the command and is generally
             * only used internally for tracking and performance monitoring.
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
