<?php

namespace Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\SearchSort;

final class SearchNodesRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:search-nodes-request:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('q', T\StringType::create())
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
            Fb::create('sort', T\StringEnumType::create())
                ->withDefault(SearchSort::RELEVANCE())
                ->className('Gdbots\Schemas\Ncr\Enum\SearchSort')
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
                ->build()
        ];
    }
}
