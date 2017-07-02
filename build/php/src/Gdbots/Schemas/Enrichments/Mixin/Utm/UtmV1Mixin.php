<?php

namespace Gdbots\Schemas\Enrichments\Mixin\Utm;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class UtmV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:enrichments:mixin:utm:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('utm_source', T\StringType::create())
                ->maxLength(50)
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
            Fb::create('utm_medium', T\StringType::create())
                ->maxLength(50)
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
            Fb::create('utm_term', T\StringType::create())
                ->maxLength(100)
                ->pattern('^[\w\s\/\.,:-]+$')
                ->build(),
            Fb::create('utm_content', T\StringType::create())
                ->maxLength(50)
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
            Fb::create('utm_campaign', T\StringType::create())
                ->maxLength(50)
                ->pattern('^[\w\/\.:-]+$')
                ->build()
        ];
    }
}
