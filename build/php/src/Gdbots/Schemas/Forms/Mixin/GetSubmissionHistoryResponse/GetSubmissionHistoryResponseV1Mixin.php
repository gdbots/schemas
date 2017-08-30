<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-submission-history-response/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\GetSubmissionHistoryResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\SchemaId;

final class GetSubmissionHistoryResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:get-submission-history-response:1-0-0');
    }
}
