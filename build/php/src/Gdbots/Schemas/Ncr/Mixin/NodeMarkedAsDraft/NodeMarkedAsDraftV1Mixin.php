<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/node-marked-as-draft/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\NodeMarkedAsDraft;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class NodeMarkedAsDraftV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:node-marked-as-draft:1-0-0');
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
            Fb::create('slug', T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
        ];
    }
}
