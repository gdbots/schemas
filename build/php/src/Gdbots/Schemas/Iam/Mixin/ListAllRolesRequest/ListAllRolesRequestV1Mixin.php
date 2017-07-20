<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/list-all-roles-request/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\ListAllRolesRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class ListAllRolesRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:list-all-roles-request:1-0-0');
    }
}
