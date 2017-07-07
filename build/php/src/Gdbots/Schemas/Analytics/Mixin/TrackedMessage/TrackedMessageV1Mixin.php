<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/mixin/tracked-message/1-0-0.json#
namespace Gdbots\Schemas\Analytics\Mixin\TrackedMessage;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class TrackedMessageV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:analytics:mixin:tracked-message:1-0-0');
    }
}
