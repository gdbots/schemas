<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-upload-url-response/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\GetUploadUrlResponse;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\FileId;

final class GetUploadUrlResponseV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:forms:mixin:get-upload-url-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:forms:mixin:get-upload-url-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:get-upload-url-response:v1';

    const FILE_ID_FIELD = 'file_id';
    const S3_PRESIGNED_URL_FIELD = 's3_presigned_url';

    const FIELDS = [
      self::FILE_ID_FIELD,
      self::S3_PRESIGNED_URL_FIELD,
    ];

    final private function __construct() {}

    public static function getId(): SchemaId
    {
        return SchemaId::fromString(self::SCHEMA_ID);
    }

    public static function hasField(string $name): bool
    {
        return in_array($name, self::FIELDS, true);
    }

    /**
     * @return Field[]
     */
    public static function getFields(): array
    {
        return [
            /*
             * The id to use when sending the submission.
             */
            Fb::create(self::FILE_ID_FIELD, T\IdentifierType::create())
                ->required()
                ->className(FileId::class)
                ->build(),
            /*
             * An S3 presigned URL where the client can upload the file.
             */
            Fb::create(self::S3_PRESIGNED_URL_FIELD, T\TextType::create())
                ->format(Format::URL())
                ->build(),
        ];
    }
}
