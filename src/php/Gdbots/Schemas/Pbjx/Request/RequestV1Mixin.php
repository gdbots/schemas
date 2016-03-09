<?php

namespace Gdbots\Schemas\Pbjx\Request;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class RequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:pbjx:mixin:request:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('request_id', T\UuidType::create())
                ->required()
                ->build(),
            Fb::create('microtime', T\MicrotimeType::create())
                ->required()
                ->build(),
            Fb::create('correlator', T\MessageRefType::create())
                ->build(),
            Fb::create('retries', T\TinyIntType::create())
                ->build()
        ];
    }
}
