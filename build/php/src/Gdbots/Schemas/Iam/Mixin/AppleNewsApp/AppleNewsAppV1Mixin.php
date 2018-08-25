<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/apple-news-app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\AppleNewsApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class AppleNewsAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:apple-news-app:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('api_key', T\TextType::create())
                ->build(),
            Fb::create('api_secret', T\TextType::create())
                ->build(),
            Fb::create('channel_id', T\StringType::create())
                ->pattern('^[a-z0-9-]+$')
                ->build(),
        ];
    }
}
