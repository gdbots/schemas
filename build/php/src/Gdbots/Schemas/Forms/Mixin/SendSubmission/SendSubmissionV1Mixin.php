<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/send-submission/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\SendSubmission;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\FileId;

final class SendSubmissionV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:forms:mixin:send-submission:1-0-0';
    const SCHEMA_CURIE = 'gdbots:forms:mixin:send-submission';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:send-submission:v1';

    const FORM_REF_FIELD = 'form_ref';
    const CF_FIELD = 'cf';
    const FILE_IDS_FIELD = 'file_ids';
    const PPID_FIELD = 'ppid';
    const HASHTAGS_FIELD = 'hashtags';

    const FIELDS = [
      self::FORM_REF_FIELD,
      self::CF_FIELD,
      self::FILE_IDS_FIELD,
      self::PPID_FIELD,
      self::HASHTAGS_FIELD,
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
             * Contains answers submitted from the fields on the form.
             */
            Fb::create(self::CF_FIELD, T\DynamicFieldType::create())
                ->asAList()
                ->build(),
            /*
             * Any files uploaded should have the IDs copied here in addition to
             * being present in the "cf" field (or whereever they are mapped to).
             */
            Fb::create(self::FILE_IDS_FIELD, T\IdentifierType::create())
                ->asASet()
                ->className(FileId::class)
                ->build(),
            /*
             * Publisher provided identifier (PPID)
             */
            Fb::create(self::PPID_FIELD, T\StringType::create())
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
            Fb::create(self::HASHTAGS_FIELD, T\StringType::create())
                ->asASet()
                ->format(Format::HASHTAG())
                ->build(),
        ];
    }
}
