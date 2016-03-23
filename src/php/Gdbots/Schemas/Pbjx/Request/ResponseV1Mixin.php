<?php

namespace Gdbots\Schemas\Pbjx\Request;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class ResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:response:1-0-0');
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
                ->required()
                ->build(),
            Fb::create('request_ref', T\MessageRefType::create())
                ->build(),
            Fb::create('correlator_ref', T\MessageRefType::create())
                ->build()
        ];
    }
}
