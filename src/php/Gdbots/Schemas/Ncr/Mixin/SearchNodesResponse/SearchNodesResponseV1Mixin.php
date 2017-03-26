<?php

namespace Gdbots\Schemas\Ncr\Mixin\SearchNodesResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class SearchNodesResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:search-nodes-response:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * The total number of nodes matching the search.
             */
            Fb::create('total', T\IntType::create())
                ->build(),
            Fb::create('has_more', T\BooleanType::create())
                ->build(),
            /*
             * How long in milliseconds it took to run the query.
             */
            Fb::create('time_taken', T\MediumIntType::create())
                ->build(),
            /*
             * The maximum score of a matching node from the entire search.
             */
            Fb::create('max_score', T\FloatType::create())
                ->build(),
            Fb::create('nodes', T\MessageType::create())
                ->asAList()
                ->className('Gdbots\Schemas\Ncr\Mixin\Node\Node')
                ->overridable(true)
                ->build()
        ];
    }
}
