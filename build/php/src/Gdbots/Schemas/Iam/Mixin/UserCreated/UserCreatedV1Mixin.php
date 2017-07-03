<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/user-created/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\UserCreated;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\Mixin\User\User as GdbotsIamUser;

final class UserCreatedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:user-created:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('node', T\MessageType::create())
                ->required()
                ->anyOfClassNames([
                    GdbotsIamUser::class,
                ])
                ->build(),
        ];
    }
}
