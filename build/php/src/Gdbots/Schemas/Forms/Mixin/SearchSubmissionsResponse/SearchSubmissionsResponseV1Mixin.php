<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-submissions-response/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\SearchSubmissionsResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class SearchSubmissionsResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:search-submissions-response:1-0-0');
    }
}
