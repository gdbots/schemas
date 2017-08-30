<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/note-added-to-submission/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\NoteAddedToSubmission;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class NoteAddedToSubmissionV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:note-added-to-submission:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('submission_id', T\TimeUuidType::create())
                ->required()
                ->build(),
            Fb::create('note', T\TextType::create())
                ->build(),
            Fb::create('hashtags_added', T\StringType::create())
                ->asASet()
                ->format(Format::HASHTAG())
                ->build(),
            Fb::create('hashtags_removed', T\StringType::create())
                ->asASet()
                ->format(Format::HASHTAG())
                ->build(),
        ];
    }
}
