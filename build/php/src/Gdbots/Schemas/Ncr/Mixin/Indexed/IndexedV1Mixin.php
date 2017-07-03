<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/indexed/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\Indexed;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class IndexedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:indexed:1-0-0');
    }
}
