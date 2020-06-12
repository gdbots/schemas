<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-upload-url-request/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\GetUploadUrlRequest;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class GetUploadUrlRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:forms:mixin:get-upload-url-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:forms:mixin:get-upload-url-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:get-upload-url-request:v1';

    const FORM_REF_FIELD = 'form_ref';
    const FIELD_NAME_FIELD = 'field_name';
    const CLIENT_FILE_NAME_FIELD = 'client_file_name';

    const FIELDS = [
      self::FORM_REF_FIELD,
      self::FIELD_NAME_FIELD,
      self::CLIENT_FILE_NAME_FIELD,
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
            Fb::create(self::FORM_REF_FIELD, T\NodeRefType::create())
                ->required()
                ->build(),
            /*
             * A unique identifier (within the form) for the field.
             */
            Fb::create(self::FIELD_NAME_FIELD, T\StringType::create())
                ->required()
                ->maxLength(127)
                ->pattern('^[a-zA-Z_]{1}[\w-]*$')
                ->build(),
            Fb::create(self::CLIENT_FILE_NAME_FIELD, T\StringType::create())
                ->required()
                ->build(),
        ];
    }
}
