<?php

namespace Gdbots\Schemas\Ncr\Mixin\Sluggable;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class SluggableV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:ncr:mixin:sluggable:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * The "slug" is a secondary identifier, typically used in a url:
             * - MUST be url friendly
             * - SHOULD NOT be case sensitive
             * - SHOULD be unique within the message curie namespace
             * - CAN be changed, but in practice once nodes are published you should avoid it if possible
             */
            Fb::create('slug', T\StringType::create())
                ->format(Format::SLUG())
                ->build()
        ];
    }
}
