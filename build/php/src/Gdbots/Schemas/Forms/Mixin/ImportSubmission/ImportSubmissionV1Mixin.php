<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/import-submission/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\ImportSubmission;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class ImportSubmissionV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:import-submission:1-0-0');
    }
}
