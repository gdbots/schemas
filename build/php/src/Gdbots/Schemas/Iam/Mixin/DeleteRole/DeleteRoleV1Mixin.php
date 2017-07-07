<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/delete-role/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\DeleteRole;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class DeleteRoleV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:delete-role:1-0-0');
    }
}
