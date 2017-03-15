<?php

namespace Gdbots\Schemas\Iam\Mixin\UpdateUser;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class UpdateUserV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:update-user:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('new_node', T\MessageType::create())
                ->required()
                ->className('Gdbots\Schemas\Iam\Mixin\User\User')
                ->build(),
            /*
             * The entire node, as it appeared before it was modified.
             */
            Fb::create('old_node', T\MessageType::create())
                ->className('Gdbots\Schemas\Iam\Mixin\User\User')
                ->build()
        ];
    }
}
