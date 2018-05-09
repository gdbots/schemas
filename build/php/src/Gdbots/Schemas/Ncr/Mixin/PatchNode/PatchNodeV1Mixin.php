<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/patch-node/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\PatchNode;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class PatchNodeV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:patch-node:1-0-0');
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
            /*
             * The names of the fields this patch event should apply changes to. Sub paths can be pointed to
             * using dot notation.
             */
            Fb::create('paths', T\StringType::create())
                ->asASet()
                ->pattern('^[a-zA-Z_]{1}[a-zA-Z0-9_\.]*$')
                ->build(),
        ];
    }
}
