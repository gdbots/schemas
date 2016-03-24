<?php

namespace Gdbots\Schemas\Ncr\Edge;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\EdgeMultiplicity;

final class EdgeV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:edge:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('from_ref', T\MessageRefType::create())
                ->required()
                ->build(),
            Fb::create('to_ref', T\MessageRefType::create())
                ->required()
                ->build(),
            Fb::create('multiplicity', T\StringEnumType::create())
                ->withDefault(EdgeMultiplicity::MULTI())
                ->className('Gdbots\Schemas\Ncr\Enum\EdgeMultiplicity')
                ->overridable(true)
                ->build(),
            Fb::create('created_at', T\MicrotimeType::create())
                ->required()
                ->build()
        ];
    }
}
