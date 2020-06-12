<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-batch-request/1-0-2.json#
namespace Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class GetNodeBatchRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:get-node-batch-request:1-0-2';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:get-node-batch-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:get-node-batch-request:v1';

    const CONSISTENT_READ_FIELD = 'consistent_read';
    const NODE_REFS_FIELD = 'node_refs';

    const FIELDS = [
      self::CONSISTENT_READ_FIELD,
      self::NODE_REFS_FIELD,
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
             * If true, a strongly consistent read is used; if false (the default), an eventually consistent read is used.
             */
            Fb::create(self::CONSISTENT_READ_FIELD, T\BooleanType::create())
                ->build(),
            Fb::create(self::NODE_REFS_FIELD, T\NodeRefType::create())
                ->asASet()
                ->build(),
        ];
    }
}
