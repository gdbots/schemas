<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/mixin/response/1-0-1.json#
namespace Gdbots\Schemas\Pbjx\Mixin\Response;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Request\Request as GdbotsPbjxRequest;

final class ResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:response:1-0-1');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('response_id', T\UuidType::create())
                ->required()
                ->build(),
            Fb::create('created_at', T\MicrotimeType::create())
                ->build(),
            Fb::create('ctx_request_ref', T\MessageRefType::create())
                ->build(),
            /*
             * The "ctx_request" is the actual request object that "ctx_request_ref" refers to.
             * In some cases it's useful for request handlers to copy the request into the response
             * so the requestor has everything in one message. This will NOT always be populated.
             * A common use case is search request/response cycles where you want to know what the
             * search criteria was so you can render that along with the results.
             */
            Fb::create('ctx_request', T\MessageType::create())
                ->anyOfClassNames([
                    GdbotsPbjxRequest::class,
                ])
                ->build(),
            Fb::create('ctx_correlator_ref', T\MessageRefType::create())
                ->build(),
            /*
             * Responses can include "dereferenced" messages to prevent
             * the consumer from needing to make multiple HTTP requests.
             * It is up to the consumer to make use of the dereferenced
             * messages if/when they are provided.
             */
            Fb::create('derefs', T\MessageType::create())
                ->asAMap()
                ->build(),
            /*
             * @link https://en.wikipedia.org/wiki/HATEOAS
             */
            Fb::create('links', T\TextType::create())
                ->asAMap()
                ->build(),
            Fb::create('metas', T\TextType::create())
                ->asAMap()
                ->build(),
        ];
    }
}
