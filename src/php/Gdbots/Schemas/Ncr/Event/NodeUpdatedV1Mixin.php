<?php

namespace Gdbots\Schemas\Ncr\Event;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class NodeUpdatedV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:node-updated:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('node', T\MessageType::create())
                ->className('Gdbots\Schemas\Ncr\Node\Node')
                ->build(),
            /*
             * The entire node, as it appeared before it was modified.
             */
            Fb::create('old_node', T\MessageType::create())
                ->className('Gdbots\Schemas\Ncr\Node\Node')
                ->build(),
            /*
             * Used to perform optimistic concurrency control.
             * @link https://en.wikipedia.org/wiki/HTTP_ETag
             */
            Fb::create('old_etag', T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\.:-]+$')
                ->build()
        ];
    }
}
