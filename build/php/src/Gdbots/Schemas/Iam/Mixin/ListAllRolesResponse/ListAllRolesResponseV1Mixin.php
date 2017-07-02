<?php

namespace Gdbots\Schemas\Iam\Mixin\ListAllRolesResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class ListAllRolesResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:list-all-roles-response:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('roles', T\IdentifierType::create())
                ->asASet()
                ->className('Gdbots\Schemas\Ncr\NodeRef')
                ->build()
        ];
    }
}
