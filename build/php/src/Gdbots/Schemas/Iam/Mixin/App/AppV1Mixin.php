<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\App;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\AppId;

final class AppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:app:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('_id', T\IdentifierType::create())
                ->required()
                ->withDefault(function() { return AppId::generate(); })
                ->className(AppId::class)
                ->overridable(true)
                ->build(),
        ];
    }
}
