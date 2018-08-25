<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/email-app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\EmailApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class EmailAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:email-app:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('sendgrid_api_key', T\StringType::create())
                ->maxLength(512)
                ->pattern('^[a-z0-9]+$')
                ->build(),
        ];
    }
}
