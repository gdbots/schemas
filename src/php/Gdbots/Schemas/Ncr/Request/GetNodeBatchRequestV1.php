<?php

namespace Gdbots\Schemas\Ncr\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest\GetNodeBatchRequestV1 as GdbotsNcrGetNodeBatchRequestV1;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest\GetNodeBatchRequestV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest\GetNodeBatchRequestV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait;

final class GetNodeBatchRequestV1 extends AbstractMessage implements
    GetNodeBatchRequest,
    RequestV1,
    GdbotsNcrGetNodeBatchRequestV1
  
{
    use RequestV1Trait;
    use GetNodeBatchRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:ncr:request:get-node-batch-request:1-0-0', __CLASS__,
            [
                /*
                 * Hints is a map of data that helps the NCR decide where to read/write data from.
                 * A common use case is multi-tenant applications.
                 */
                Fb::create('hints', T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build()
            ],
            [
                RequestV1Mixin::create(), 
                GetNodeBatchRequestV1Mixin::create()
            ]
        );
    }
}
