<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-created/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\NodeCreated;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\Node\Node as GdbotsNcrNode;

final class NodeCreatedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:node-created:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('node', T\MessageType::create())
                ->required()
                ->anyOfClassNames([
                    GdbotsNcrNode::class,
                ])
                ->overridable(true)
                ->build(),
        ];
    }
}
