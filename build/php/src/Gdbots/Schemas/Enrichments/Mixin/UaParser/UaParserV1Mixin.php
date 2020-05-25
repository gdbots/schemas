<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/ua-parser/1-0-0.json#
namespace Gdbots\Schemas\Enrichments\Mixin\UaParser;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class UaParserV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:enrichments:mixin:ua-parser:1-0-0';
    const SCHEMA_CURIE = 'gdbots:enrichments:mixin:ua-parser';
    const SCHEMA_CURIE_MAJOR = 'gdbots:enrichments:mixin:ua-parser:v1';

    const CTX_UA_FIELD = 'ctx_ua';
    const CTX_UA_PARSED_FIELD = 'ctx_ua_parsed';

    const FIELDS = [
      self::CTX_UA_FIELD,
      self::CTX_UA_PARSED_FIELD,
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
            Fb::create(self::CTX_UA_FIELD, T\TextType::create())
                ->overridable(true)
                ->build(),
            Fb::create(self::CTX_UA_PARSED_FIELD, T\MessageType::create())
                ->anyOfCuries([
                    'gdbots:contexts::user-agent',
                ])
                ->build(),
        ];
    }
}
