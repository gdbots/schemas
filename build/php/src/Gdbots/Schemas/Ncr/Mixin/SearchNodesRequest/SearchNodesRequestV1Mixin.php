<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/search-nodes-request/1-0-1.json#
namespace Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;

final class SearchNodesRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:search-nodes-request:1-0-1');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('q', T\TextType::create())
                ->maxLength(2000)
                ->build(),
            /*
             * The number of results to return.
             */
            Fb::create('count', T\TinyIntType::create())
                ->withDefault(25)
                ->build(),
            Fb::create('page', T\TinyIntType::create())
                ->min(1)
                ->withDefault(1)
                ->build(),
            /*
             * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
             * When cursor is present it should be used instead of "page".
             */
            Fb::create('cursor', T\StringType::create())
                ->build(),
            /*
             * The status a node must be in to match the search request.
             */
            Fb::create('status', T\StringEnumType::create())
                ->className(NodeStatus::class)
                ->build(),
            /*
             * A set of statuses (node must match at least one) to include in the search results.
             */
            Fb::create('statuses', T\StringEnumType::create())
                ->asASet()
                ->className(NodeStatus::class)
                ->build(),
            Fb::create('created_after', T\DateTimeType::create())
                ->build(),
            Fb::create('created_before', T\DateTimeType::create())
                ->build(),
            Fb::create('updated_after', T\DateTimeType::create())
                ->build(),
            Fb::create('updated_before', T\DateTimeType::create())
                ->build(),
            /*
             * The fields that are being queried as determined by parsing the "q" field.
             */
            Fb::create('fields_used', T\StringType::create())
                ->asASet()
                ->pattern('^[\w\.-]+$')
                ->build(),
            Fb::create('parsed_query_json', T\TextType::create())
                ->build(),
        ];
    }
}
