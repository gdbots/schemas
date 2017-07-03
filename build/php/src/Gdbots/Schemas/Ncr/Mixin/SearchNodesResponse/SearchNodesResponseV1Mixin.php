<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/ncr/mixin/search-nodes-response/1-0-0.json#
namespace Gdbots\Schemas\Ncr\Mixin\SearchNodesResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\Node\Node as GdbotsNcrNode;

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
            /*
             * Cursors are optionally provided by the underlying search system to allow for efficient
             * pagination. In the absense of cursors, paging is done using count and page number.
             */
            Fb::create('cursors', T\StringType::create())
                ->asAMap()
                ->build(),
            Fb::create('nodes', T\MessageType::create())
                ->asAList()
                ->anyOfClassNames([
                    GdbotsNcrNode::class,
                ])
                ->overridable(true)
                ->build(),
        ];
    }
}
