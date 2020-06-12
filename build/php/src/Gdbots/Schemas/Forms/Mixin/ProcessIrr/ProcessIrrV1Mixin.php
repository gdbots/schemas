<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/process-irr/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\ProcessIrr;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Enum\IrrType;

final class ProcessIrrV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:forms:mixin:process-irr:1-0-0';
    const SCHEMA_CURIE = 'gdbots:forms:mixin:process-irr';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:process-irr:v1';

    const TYPE_FIELD = 'type';
    const EMAIL_FIELD = 'email';

    const FIELDS = [
      self::TYPE_FIELD,
      self::EMAIL_FIELD,
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
            Fb::create(self::TYPE_FIELD, T\StringEnumType::create())
                ->required()
                ->className(IrrType::class)
                ->build(),
            Fb::create(self::EMAIL_FIELD, T\StringType::create())
                ->format(Format::EMAIL())
                ->build(),
        ];
    }
}
