<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/grant-roles-to-user/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\GrantRolesToUser;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class GrantRolesToUserV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:grant-roles-to-user:1-0-0');
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
             * The roles to grant to the user.
             */
            Fb::create('roles', T\IdentifierType::create())
                ->asASet()
                ->className(NodeRef::class)
                ->build(),
        ];
    }
}
