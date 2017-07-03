<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/user-deleted/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\UserDeleted;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class UserDeletedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:user-deleted:1-0-0');
    }
}
