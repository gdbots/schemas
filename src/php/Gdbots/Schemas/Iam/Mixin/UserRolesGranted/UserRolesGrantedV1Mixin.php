<?php

namespace Gdbots\Schemas\Iam\Mixin\UserRolesGranted;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class UserRolesGrantedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:user-roles-granted:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('node_ref', T\IdentifierType::create())
                ->required()
                ->className('Gdbots\Schemas\Ncr\NodeRef')
                ->build(),
            /*
             * The roles granted to the user.
             */
            Fb::create('roles', T\IdentifierType::create())
                ->asASet()
                ->className('Gdbots\Schemas\Ncr\NodeRef')
                ->build()
        ];
    }
}