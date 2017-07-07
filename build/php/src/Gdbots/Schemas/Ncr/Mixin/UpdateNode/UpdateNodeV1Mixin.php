<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/update-node/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\UpdateNode;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\Node\Node as GdbotsNcrNode;
use Gdbots\Schemas\Ncr\NodeRef;

final class UpdateNodeV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:update-node:1-0-0');
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
