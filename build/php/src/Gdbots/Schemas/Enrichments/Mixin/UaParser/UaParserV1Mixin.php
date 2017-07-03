<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/enrichments/mixin/ua-parser/1-0-0.json#
namespace Gdbots\Schemas\Enrichments\Mixin\UaParser;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Contexts\UserAgent as GdbotsContextsUserAgent;

final class UaParserV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:enrichments:mixin:ua-parser:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('ctx_ua', T\TextType::create())
                ->overridable(true)
                ->build(),
            Fb::create('ctx_ua_parsed', T\MessageType::create())
                ->anyOfClassNames([
                    GdbotsContextsUserAgent::class,
                ])
                ->build(),
        ];
    }
}
