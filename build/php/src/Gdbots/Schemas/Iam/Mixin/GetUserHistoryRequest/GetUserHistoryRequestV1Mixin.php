<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/get-user-history-request/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\GetUserHistoryRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class GetUserHistoryRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:get-user-history-request:1-0-0');
    }
}
