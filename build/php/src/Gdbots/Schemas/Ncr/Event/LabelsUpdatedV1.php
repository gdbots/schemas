<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/event/labels-updated/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;

final class LabelsUpdatedV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:event:labels-updated:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:event:labels-updated';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:event:labels-updated:v1';

    const MIXINS = [
      'gdbots:pbjx:mixin:event:v1',
      'gdbots:pbjx:mixin:event',
      'gdbots:common:mixin:labelable:v1',
      'gdbots:common:mixin:labelable',
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
    const LABELS_FIELD = 'labels';
    const LABELS_UPDATED_FIELD = 'labels_updated';
    const LABELS_REMOVED_FIELD = 'labels_removed';
    const NEW_ETAG_FIELD = 'new_etag';
    const OLD_ETAG_FIELD = 'old_etag';

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
      self::LABELS_FIELD,
      self::LABELS_UPDATED_FIELD,
      self::LABELS_REMOVED_FIELD,
      self::NEW_ETAG_FIELD,
      self::OLD_ETAG_FIELD,
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
                /*
                 * Labels is a list that categorizes data or tracks references in
                 * external systems.
                 */
                Fb::create(self::LABELS_FIELD, T\StringType::create())
                    ->asAList()
                    ->build(),
                Fb::create(self::LABELS_UPDATED_FIELD, T\StringType::create())
                    ->asAList()
                    ->required()
                    ->build(),
                Fb::create(self::LABELS_REMOVED_FIELD, T\StringType::create())
                    ->asAList()
                    ->required()
                    ->build(),
                Fb::create(self::NEW_ETAG_FIELD, T\StringType::create())
                    ->maxLength(100)
                    ->pattern('^[\w\.:-]+$')
                    ->build(),
                Fb::create(self::OLD_ETAG_FIELD, T\StringType::create())
                    ->maxLength(100)
                    ->pattern('^[\w\.:-]+$')
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
