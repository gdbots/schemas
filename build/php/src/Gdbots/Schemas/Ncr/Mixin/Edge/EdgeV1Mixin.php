<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/edge/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Edge;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\EdgeMultiplicity;
use Gdbots\Schemas\Ncr\NodeRef;

final class EdgeV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:edge:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('from_ref', T\IdentifierType::create())
                ->required()
                ->className(NodeRef::class)
                ->build(),
            Fb::create('to_ref', T\IdentifierType::create())
                ->required()
                ->className(NodeRef::class)
                ->build(),
            Fb::create('multiplicity', T\StringEnumType::create())
                ->withDefault(EdgeMultiplicity::MULTI())
                ->className(EdgeMultiplicity::class)
                ->overridable(true)
                ->build(),
            Fb::create('created_at', T\MicrotimeType::create())
                ->build(),
        ];
    }
}