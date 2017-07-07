<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/indexed/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Indexed;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class IndexedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:indexed:1-0-0');
    }
}
