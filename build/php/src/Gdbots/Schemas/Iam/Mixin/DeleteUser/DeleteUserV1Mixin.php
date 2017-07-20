<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/delete-user/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\DeleteUser;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class DeleteUserV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:delete-user:1-0-0');
    }
}
