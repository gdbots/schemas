<?php

namespace Gdbots\Schemas\Iam\Mixin\UpdateRole;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class UpdateRoleV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:update-role:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('new_node', T\MessageType::create())
                ->required()
                ->className('Gdbots\Schemas\Iam\Mixin\Role\Role')
                ->build(),
            /*
             * The entire node, as it appeared before it was modified.
             */
            Fb::create('old_node', T\MessageType::create())
                ->className('Gdbots\Schemas\Iam\Mixin\Role\Role')
                ->build()
        ];
    }
}
