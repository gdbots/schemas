<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/mark-submissions-as-unread/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\MarkSubmissionsAsUnread;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class MarkSubmissionsAsUnreadV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:mark-submissions-as-unread:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('submission_ids', T\TimeUuidType::create())
                ->asASet()
                ->build(),
        ];
    }
}
