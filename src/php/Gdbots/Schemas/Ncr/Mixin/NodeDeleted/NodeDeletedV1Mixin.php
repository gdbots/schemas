<?php

namespace Gdbots\Schemas\Ncr\Mixin\NodeDeleted;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class NodeDeletedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:node-deleted:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('node_ref', T\MessageRefType::create())
                ->build(),
            Fb::create('slug', T\StringType::create())
                ->format(Format::SLUG())
                ->build()
        ];
    }
}