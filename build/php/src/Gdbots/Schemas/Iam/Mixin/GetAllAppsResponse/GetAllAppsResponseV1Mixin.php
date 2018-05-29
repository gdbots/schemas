<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/get-all-apps-response/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\GetAllAppsResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\Mixin\App\App as GdbotsIamApp;

final class GetAllAppsResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:get-all-apps-response:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('nodes', T\MessageType::create())
                ->asAList()
                ->anyOfClassNames([
                    GdbotsIamApp::class,
                ])
                ->build(),
        ];
    }
}
