<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-batch-response/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\GetNodeBatchResponse;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class GetNodeBatchResponseV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:get-node-batch-response:1-0-0';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:get-node-batch-response';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:get-node-batch-response:v1';

    const NODES_FIELD = 'nodes';
    const MISSING_NODE_REFS_FIELD = 'missing_node_refs';

    const FIELDS = [
      self::NODES_FIELD,
      self::MISSING_NODE_REFS_FIELD,
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
                ->asAMap()
                ->anyOfCuries([
                    'gdbots:ncr:mixin:node',
                ])
                ->overridable(true)
                ->build(),
            /*
             * The "missing_node_refs" field contains a set of node_refs that
             * the batch request failed to retrieve.
             */
            Fb::create(self::MISSING_NODE_REFS_FIELD, T\NodeRefType::create())
                ->asASet()
                ->build(),
        ];
    }
}
