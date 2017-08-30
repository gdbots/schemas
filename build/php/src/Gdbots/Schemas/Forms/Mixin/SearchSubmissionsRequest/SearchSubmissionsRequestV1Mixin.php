<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-submissions-request/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\SearchSubmissionsRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class SearchSubmissionsRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:search-submissions-request:1-0-0');
    }
}
