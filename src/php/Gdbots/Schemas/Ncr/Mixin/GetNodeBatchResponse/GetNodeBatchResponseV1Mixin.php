<?php

namespace Gdbots\Schemas\Ncr\Mixin\GetNodeBatchResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
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
                ->className('Gdbots\Schemas\Ncr\Mixin\Node\Node')
                ->build(),
            /*
             * The "missing_node_refs" field contains a set of node_refs that
             * the batch request failed to retrieve.
             */
            Fb::create('missing_node_refs', T\IdentifierType::create())
                ->asASet()
                ->className('Gdbots\Schemas\Ncr\NodeRef')
                ->build(),
            /*
             * The "missing_slugs" field contains a set of slugs that
             * the batch request failed to retrieve.
             */
            Fb::create('missing_slugs', T\StringType::create())
                ->asASet()
                ->format(Format::SLUG())
                ->build()
        ];
    }
}
