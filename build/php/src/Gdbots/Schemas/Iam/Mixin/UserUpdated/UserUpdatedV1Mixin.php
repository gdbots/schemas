<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/user-updated/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\UserUpdated;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\Mixin\User\User as GdbotsIamUser;

final class UserUpdatedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:user-updated:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('new_node', T\MessageType::create())
                ->required()
                ->anyOfClassNames([
                    GdbotsIamUser::class,
                ])
                ->build(),
            /*
             * The entire node, as it appeared before it was modified.
             */
            Fb::create('old_node', T\MessageType::create())
                ->anyOfClassNames([
                    GdbotsIamUser::class,
                ])
                ->build(),
        ];
    }
}
