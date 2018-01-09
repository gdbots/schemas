<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/lockable/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Lockable;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class LockableV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:lockable:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * A node being locked will vary in how it's implemented but the
             * general idea is that only the user who locked it can modify it.
             */
            Fb::create('is_locked', T\BooleanType::create())
                ->build(),
            /*
             * The user (or app) that has "locked" the node.
             */
            Fb::create('locked_by_ref', T\IdentifierType::create())
                ->className(NodeRef::class)
                ->build(),
        ];
    }
}
