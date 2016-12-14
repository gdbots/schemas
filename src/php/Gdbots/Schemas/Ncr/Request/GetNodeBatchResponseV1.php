<?php

namespace Gdbots\Schemas\Ncr\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchResponse\GetNodeBatchResponseV1 as GdbotsNcrGetNodeBatchResponseV1;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchResponse\GetNodeBatchResponseV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchResponse\GetNodeBatchResponseV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait;

final class GetNodeBatchResponseV1 extends AbstractMessage implements
    GetNodeBatchResponse,
    ResponseV1,
    GdbotsNcrGetNodeBatchResponseV1
  
{
    use ResponseV1Trait;
    use GetNodeBatchResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:ncr:request:get-node-batch-response:1-0-0', __CLASS__,
            [],
            [
                ResponseV1Mixin::create(), 
                GetNodeBatchResponseV1Mixin::create()
            ]
        );
    }
}
