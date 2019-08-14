<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-batch-request/1-0-1.json#
namespace Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest;

use Gdbots\Pbj\AbstractMixin;
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
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:get-node-batch-request:1-0-1');
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
            Fb::create('node_refs', T\IdentifierType::create())
                ->asASet()
                ->className(NodeRef::class)
                ->build(),
            /*
             * Field names to dereference, this serves as a hint to the server and is not
             * necessarily gauranteed since authorization, availability, etc. are determined
             * by the server not the client.
             */
            Fb::create('derefs', T\StringType::create())
                ->asASet()
                ->pattern('^[\w\.-]+$')
                ->build(),
        ];
    }
}
