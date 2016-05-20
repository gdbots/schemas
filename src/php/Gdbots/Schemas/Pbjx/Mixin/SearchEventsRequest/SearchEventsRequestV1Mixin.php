<?php

namespace Gdbots\Schemas\Pbjx\Mixin\SearchEventsRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Enum\SearchSort;

final class SearchEventsRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:search-events-request:1-0-0');
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
                ->min(1)
                ->withDefault(25)
                ->build(),
            Fb::create('page', T\TinyIntType::create())
                ->min(1)
                ->withDefault(1)
                ->build(),
            Fb::create('sort', T\StringEnumType::create())
                ->withDefault(SearchSort::RELEVANCE())
                ->className('Gdbots\Schemas\Pbjx\Enum\SearchSort')
                ->build(),
            Fb::create('occurred_after', T\DateTimeType::create())
                ->build(),
            Fb::create('occurred_before', T\DateTimeType::create())
                ->build(),
            Fb::create('parsed_query_json', T\TextType::create())
                ->build()
        ];
    }
}
