<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/patch-nodes/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\PatchNodes;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class PatchNodesV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:patch-nodes:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('node_refs', T\IdentifierType::create())
                ->asASet()
                ->className(NodeRef::class)
                ->build(),
            /*
             * The names of the fields this patch command should apply changes to.
             * Nested paths can be referenced using dot notation.
             */
            Fb::create('paths', T\StringType::create())
                ->asASet()
                ->pattern('^[a-zA-Z_]{1}[\w\.]*$')
                ->build(),
        ];
    }
}
