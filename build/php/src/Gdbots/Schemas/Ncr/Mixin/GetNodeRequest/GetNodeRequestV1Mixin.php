<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/get-node-request/1-0-2.json#
namespace Gdbots\Schemas\Ncr\Mixin\GetNodeRequest;

use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class GetNodeRequestV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:ncr:mixin:get-node-request:1-0-2';
    const SCHEMA_CURIE = 'gdbots:ncr:mixin:get-node-request';
    const SCHEMA_CURIE_MAJOR = 'gdbots:ncr:mixin:get-node-request:v1';

    const CONSISTENT_READ_FIELD = 'consistent_read';
    const NODE_REF_FIELD = 'node_ref';
    const QNAME_FIELD = 'qname';
    const SLUG_FIELD = 'slug';

    const FIELDS = [
      self::CONSISTENT_READ_FIELD,
      self::NODE_REF_FIELD,
      self::QNAME_FIELD,
      self::SLUG_FIELD,
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
            /*
             * When "node_ref" is supplied it SHOULD be used to perform the request.
             * The "node_ref" and "slug" are analogous to protobuf unions in that
             * only one of these should exist and the priority of selection is as
             * ordered in this schema.
             */
            Fb::create(self::NODE_REF_FIELD, T\NodeRefType::create())
                ->build(),
            /*
             * The "qname" field should be populated when the request is not
             * using "node_ref", e.g. "acme:article"
             */
            Fb::create(self::QNAME_FIELD, T\StringType::create())
                ->pattern('^[a-z0-9-]+:[a-z0-9-]+$')
                ->build(),
            Fb::create(self::SLUG_FIELD, T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
        ];
    }
}
