<?php

namespace Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class GetNodeBatchRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:get-node-batch-request:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * When "node_refs" is supplied it SHOULD be used to perform the request.
             * The "node_refs" and "slugs" are analogous to protobuf unions in that
             * only one of these should exist and the priority of selection is as
             * ordered in this schema.
             */
            Fb::create('node_refs', T\IdentifierType::create())
                ->asASet()
                ->className('Gdbots\Schemas\Ncr\NodeRef')
                ->build(),
            Fb::create('slugs', T\StringType::create())
                ->asASet()
                ->format(Format::SLUG())
                ->build()
        ];
    }
}
