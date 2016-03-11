<?php

namespace Gdbots\Schemas\Ncr;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class NodeV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:node:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('_id', T\IdentifierType::create())
                ->required()
                ->withDefault(function() { return \Gdbots\Identifiers\UuidIdentifier::generate(); })
                ->className('Gdbots\Identifiers\UuidIdentifier')
                ->overridable(true)
                ->build(),
            Fb::create('slug', T\StringType::create())
                ->format(Format::SLUG())
                ->build(),
            Fb::create('status', T\StringType::create())
                ->pattern('^[A-Za-z0-9_\-]+$')
                ->withDefault("draft")
                ->overridable(true)
                ->build(),
            Fb::create('etag', T\StringType::create())
                ->maxLength(100)
                ->pattern('^[A-Za-z0-9_\-]+$')
                ->build(),
            Fb::create('created_at', T\MicrotimeType::create())
                ->required()
                ->build(),
            Fb::create('updated_at', T\MicrotimeType::create())
                ->useTypeDefault(false)
                ->build(),
            Fb::create('published_at', T\MicrotimeType::create())
                ->useTypeDefault(false)
                ->build()
        ];
    }
}
