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
             * If true, a strongly consistent read is used; if false (the default), an eventually consistent read is used.
             */
            Fb::create('consistent_read', T\BooleanType::create())
                ->build(),
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
            /*
             * The "qname" field should be populated when the request is not
             * using "node_refs", e.g. "acme:article"
             */
            Fb::create('qname', T\StringType::create())
                ->pattern('^[a-z0-9-]+:[a-z0-9-]+$')
                ->build(),
            Fb::create('slugs', T\StringType::create())
                ->asASet()
                ->format(Format::SLUG())
                ->build()
        ];
    }
}
