<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-batch-response/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\GetNodeBatchResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\Node\Node as GdbotsNcrNode;
use Gdbots\Schemas\Ncr\NodeRef;

final class GetNodeBatchResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:get-node-batch-response:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('nodes', T\MessageType::create())
                ->asAMap()
                ->anyOfClassNames([
                    GdbotsNcrNode::class,
                ])
                ->overridable(true)
                ->build(),
            /*
             * The "missing_node_refs" field contains a set of node_refs that
             * the batch request failed to retrieve.
             */
            Fb::create('missing_node_refs', T\IdentifierType::create())
                ->asASet()
                ->className(NodeRef::class)
                ->build(),
        ];
    }
}
