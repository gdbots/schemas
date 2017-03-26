<?php

namespace Gdbots\Schemas\Ncr\Mixin\Node;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;

final class NodeV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:node:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * The "_id" value:
             * - MUST NOT change for the life of the node.
             * - SHOULD be globally unique
             * - SHOULD be generated by the app (ideally in default value closure... e.g. UuidIdentifier::generate())
             */
            Fb::create('_id', T\IdentifierType::create())
                ->required()
                ->withDefault(function() { return UuidIdentifier::generate(); })
                ->className('Gdbots\Pbj\WellKnown\UuidIdentifier')
                ->overridable(true)
                ->build(),
            Fb::create('status', T\StringEnumType::create())
                ->withDefault(NodeStatus::DRAFT())
                ->className('Gdbots\Schemas\Ncr\Enum\NodeStatus')
                ->build(),
            Fb::create('etag', T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build(),
            Fb::create('created_at', T\MicrotimeType::create())
                ->build(),
            /*
             * A fully qualified reference to what created this node. This is intentionally a message-ref
             * and not a user id because it is often a program that creates nodes, not a user.
             */
            Fb::create('creator_ref', T\MessageRefType::create())
                ->build(),
            Fb::create('updated_at', T\MicrotimeType::create())
                ->useTypeDefault(false)
                ->build(),
            /*
             * A fully qualified reference to what updated this node. This is intentionally a message-ref
             * and not a user id because it is often a program that updates nodes, not a user.
             * E.g. "acme:iam:node:app:cli-scheduler" or "acme:iam:node:user:60c71df0-fda8-11e5-bfb9-30342d363854"
             */
            Fb::create('updater_ref', T\MessageRefType::create())
                ->build(),
            /*
             * A reference to the last event that changed the state of this node.
             * E.g. "acme:blog:event:article-published:60c71df0-fda8-11e5-bfb9-30342d363854"
             */
            Fb::create('last_event_ref', T\MessageRefType::create())
                ->build(),
            Fb::create('title', T\StringType::create())
                ->build()
        ];
    }
}
