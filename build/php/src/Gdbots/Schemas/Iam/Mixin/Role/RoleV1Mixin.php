<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/role/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\Role;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\RoleId;

final class RoleV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:role:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('_id', T\IdentifierType::create())
                ->required()
                ->className(RoleId::class)
                ->build(),
            /*
             * The "allowed" field is a set of actions that a user will be granted.
             * Although the string can be anything it is best practice to use the
             * curies of the pbjx commands and requests from your application.
             * E.g. "acme:blog:command:publish-article" or "acme:blog:command:*"
             */
            Fb::create('allowed', T\StringType::create())
                ->asASet()
                ->pattern('^[a-z0-9_\*\.:-]+$')
                ->build(),
            /*
             * The "denied" field works just like the "allowed" field with the
             * exception that these rules take precedence and deny a user's
             * ability to perform the action.
             */
            Fb::create('denied', T\StringType::create())
                ->asASet()
                ->pattern('^[a-z0-9_\*\.:-]+$')
                ->build(),
        ];
    }
}
