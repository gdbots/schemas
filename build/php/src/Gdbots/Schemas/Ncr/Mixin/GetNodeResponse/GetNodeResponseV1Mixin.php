<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-response/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\GetNodeResponse;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class GetNodeResponseV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:get-node-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:get-node-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:get-node-response:v1';

    const NODE_FIELD = 'node';

    const FIELDS = [
      self::NODE_FIELD,
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
            Fb::create(self::NODE_FIELD, T\MessageType::create())
                ->anyOfCuries([
                    'gdbots:ncr:mixin:node',
                ])
                ->overridable(true)
                ->build(),
        ];
    }
}
