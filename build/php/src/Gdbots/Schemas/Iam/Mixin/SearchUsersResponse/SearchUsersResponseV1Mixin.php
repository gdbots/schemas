<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/search-users-response/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\SearchUsersResponse;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class SearchUsersResponseV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:search-users-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:search-users-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:search-users-response:v1';

    const NODES_FIELD = 'nodes';

    const FIELDS = [
      self::NODES_FIELD,
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
            Fb::create(self::NODES_FIELD, T\MessageType::create())
                ->asAList()
                ->anyOfCuries([
                    'gdbots:iam:mixin:user',
                ])
                ->build(),
        ];
    }
}
