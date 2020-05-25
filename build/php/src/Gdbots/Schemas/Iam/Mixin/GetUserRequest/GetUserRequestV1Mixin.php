<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/get-user-request/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\GetUserRequest;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class GetUserRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:get-user-request:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:get-user-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:get-user-request:v1';

    const EMAIL_FIELD = 'email';

    const FIELDS = [
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
            Fb::create(self::EMAIL_FIELD, T\StringType::create())
                ->format(Format::EMAIL())
                ->build(),
        ];
    }
}
