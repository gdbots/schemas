<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-upload-url-response/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\GetUploadUrlResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Files\FileId;

final class GetUploadUrlResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:get-upload-url-response:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * The id to use when sending the submission.
             */
            Fb::create('file_id', T\IdentifierType::create())
                ->required()
                ->className(FileId::class)
                ->build(),
            /*
             * An S3 presigned URL where the client can upload the file.
             */
            Fb::create('s3_presigned_url', T\TextType::create())
                ->format(Format::URL())
                ->build(),
        ];
    }
}
