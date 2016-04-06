<?php

namespace Gdbots\Schemas\Ncr\Command;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class UpdateNodeV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:update-node:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * Used to perform optimistic concurrency control.
             * @link https://en.wikipedia.org/wiki/HTTP_ETag
             */
            Fb::create('expected_etag', T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build(),
            Fb::create('new_node', T\MessageType::create())
                ->className('Gdbots\Schemas\Ncr\Node\Node')
                ->build(),
            Fb::create('old_node', T\MessageType::create())
                ->className('Gdbots\Schemas\Ncr\Node\Node')
                ->build()
        ];
    }
}
