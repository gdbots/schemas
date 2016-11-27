<?php

namespace Gdbots\Schemas\Ncr\Mixin\IndexNodeBatch;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class IndexNodeBatchV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:index-node-batch:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('node_refs', T\IdentifierType::create())
                ->asASet()
                ->required()
                ->className('Gdbots\Schemas\Ncr\NodeRef')
                ->build()
        ];
    }
}
