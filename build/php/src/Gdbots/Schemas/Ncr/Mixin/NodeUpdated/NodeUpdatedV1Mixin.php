<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-updated/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\NodeUpdated;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\Node\Node as GdbotsNcrNode;
use Gdbots\Schemas\Ncr\NodeRef;

final class NodeUpdatedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:node-updated:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('node_ref', T\IdentifierType::create())
                ->required()
                ->className(NodeRef::class)
                ->build(),
            Fb::create('slug', T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
            Fb::create('new_etag', T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build(),
            Fb::create('old_etag', T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build(),
            Fb::create('new_node', T\MessageType::create())
                ->required()
                ->anyOfClassNames([
                    GdbotsNcrNode::class,
                ])
                ->overridable(true)
                ->build(),
            /*
             * The entire node, as it appeared before it was modified.
             */
            Fb::create('old_node', T\MessageType::create())
                ->anyOfClassNames([
                    GdbotsNcrNode::class,
                ])
                ->overridable(true)
                ->build(),
        ];
    }
}
