<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-request/1-0-1.json#
namespace Gdbots\Schemas\Ncr\Mixin\GetNodeRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class GetNodeRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:get-node-request:1-0-1');
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
             * When "node_ref" is supplied it SHOULD be used to perform the request.
             * The "node_ref" and "slug" are analogous to protobuf unions in that
             * only one of these should exist and the priority of selection is as
             * ordered in this schema.
             */
            Fb::create('node_ref', T\IdentifierType::create())
                ->className(NodeRef::class)
                ->build(),
            /*
             * The "qname" field should be populated when the request is not
             * using "node_ref", e.g. "acme:article"
             */
            Fb::create('qname', T\StringType::create())
                ->pattern('^[a-z0-9-]+:[a-z0-9-]+$')
                ->build(),
            Fb::create('slug', T\StringType::create())
                ->format(Format::SLUG())
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
