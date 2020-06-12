<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/command/delete-node/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Command;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class DeleteNodeV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:command:delete-node:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:command:delete-node';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:command:delete-node:v1';

    const MIXINS = [
      'gdbots:pbjx:mixin:command:v1',
      'gdbots:pbjx:mixin:command',
      'gdbots:common:mixin:taggable:v1',
      'gdbots:common:mixin:taggable',
    ];

    const COMMAND_ID_FIELD = 'command_id';
    const OCCURRED_AT_FIELD = 'occurred_at';
    const EXPECTED_ETAG_FIELD = 'expected_etag';
    const CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
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
    const CTX_MSG_FIELD = 'ctx_msg';
    const TAGS_FIELD = 'tags';
    const NODE_REF_FIELD = 'node_ref';

    const FIELDS = [
      self::COMMAND_ID_FIELD,
      self::OCCURRED_AT_FIELD,
      self::EXPECTED_ETAG_FIELD,
      self::CTX_TENANT_ID_FIELD,
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
      self::CTX_MSG_FIELD,
      self::TAGS_FIELD,
      self::NODE_REF_FIELD,
    ];

    use GdbotsPbjxCommandV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
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
                 * Multi-tenant apps can use this field to track the tenant id.
                 */
                Fb::create(self::CTX_TENANT_ID_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
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
                /*
                 * An optional message/reason for the command being sent.
                 * Consider this like a git commit message.
                 */
                Fb::create(self::CTX_MSG_FIELD, T\TextType::create())
                    ->build(),
                /*
                 * Tags is a map that categorizes data or tracks references in
                 * external systems. The tags names should be consistent and descriptive,
                 * e.g. fb_user_id:123, salesforce_customer_id:456.
                 */
                Fb::create(self::TAGS_FIELD, T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create(self::NODE_REF_FIELD, T\NodeRefType::create())
                    ->required()
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
