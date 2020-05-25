<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/search-forms-response/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\SearchFormsResponse;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class SearchFormsResponseV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:forms:mixin:search-forms-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:forms:mixin:search-forms-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:forms:mixin:search-forms-response:v1';

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
                    'gdbots:forms:mixin:form',
                ])
                ->build(),
        ];
    }
}
