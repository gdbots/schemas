<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/send-submission/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\SendSubmission;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Files\FileId;
use Gdbots\Schemas\Ncr\NodeRef;

final class SendSubmissionV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:send-submission:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('form_ref', T\IdentifierType::create())
                ->required()
                ->className(NodeRef::class)
                ->build(),
            /*
             * Contains answers submitted from the fields on the form.
             */
            Fb::create('cf', T\DynamicFieldType::create())
                ->asAList()
                ->build(),
            /*
             * Any files uploaded should have the IDs copied here in addition to
             * being present in the "cf" field (or whereever they are mapped to).
             */
            Fb::create('file_ids', T\IdentifierType::create())
                ->asASet()
                ->className(FileId::class)
                ->build(),
            /*
             * Publisher provided identifier (PPID)
             */
            Fb::create('ppid', T\StringType::create())
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
            Fb::create('hashtags', T\StringType::create())
                ->asASet()
                ->format(Format::HASHTAG())
                ->build(),
        ];
    }
}
