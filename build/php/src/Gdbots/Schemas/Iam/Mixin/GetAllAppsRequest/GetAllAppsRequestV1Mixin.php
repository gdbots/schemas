<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/get-all-apps-request/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\GetAllAppsRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class GetAllAppsRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:get-all-apps-request:1-0-0');
    }
}
